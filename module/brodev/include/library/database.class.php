<?php
/**
 * database.php
 *
 * A wrapper class for accessing, abstracting and manipulating a MySQL database.
 * 
 * @author 		Miles Johnson - www.milesj.me
 * @copyright	Copyright 2006-2009, Miles Johnson, Inc.
 * @license 	http://www.opensource.org/licenses/mit-license.php - Licensed under The MIT License
 * @package     DataBasic - Basic Database Access
 * @version     2.3.2
 * @link		www.milesj.me/resources/script/database-handler
 */
 
class Database { 

	/**
	 * Current version: www.milesj.me/files/logs/database-handler
	 *
	 * @access public
	 * @var int
	 */
	public $version = '2.3.2';
	
	/**
	 * If you want data returned as an object instead of an array.
	 *
	 * @access private
	 * @var boolean
	 */
	private $__asObject = false;
	
	/**
	 * Holds the database connection link.
	 *
	 * @access private
	 * @var mixed
	 */
	private $__connection = null;
	
	/**
	 * Holds data for SQLs and binds.
	 *
	 * @access private
	 * @var array
	 */
	private $__data;
	
	/**
	 * Contains database connection information.
	 *
	 * @access private
	 * @var array
	 */
	private $__db = array();
	 
	/**
	 * If enabled, logs all queries and executions.
	 *
	 * @access private
	 * @var boolean
	 */
	private $__debug = true;
	
	/**
	 * Number of successful queries executed.
	 *
	 * @access private
	 * @var int
	 */
	private $__executed;  

	/**
	 * Contains the database instance.
	 *
	 * @access private
	 * @var instance
	 */
	private static $__instance;
	
	/**
	 * Should the connection be persistent?
	 * @access private
	 * @var boolean
	 */
	private $__persistent = true; 
	
	/**
	 * A list of all queries being processed on a page.
	 *
	 * @access private
	 * @var array
	 */
	private $__queries;
	
	/**
	 * The current database being used .
	 *
	 * @access private
	 * @var string
	 */ 
	static $__useDb;
	private $__dbInstance;
	
	/**
	 * Connects to the database on class initialize; use getInstance().
	 *
	 * @access private
	 * @return void
	 */
	 
	private $__mysqlFunctions = array (
		'NOW()',
		'CURDATE()',
		'DATE()',
	);
	 
	private function __construct() {
		// Load object without connecting to the database
	} 
	
	/**
	 * Add a binded value column pair to the respective call.
	 *
	 * @access public
	 * @param $dataBit
	 * @param $key
	 * @param $value
	 * @return string
	 */
	public function addBind($dataBit, $key, $value) {
		if (isset($this->__data[$dataBit]['binds'][':'. $key .':'])) {
			$key .= count($this->__data[$dataBit]['binds']);
		}
		$key = ':'. trim($key, ':') .':';
		
		$this->__data[$dataBit]['binds'][$key] = $value;
		return $key;
	}
	
	/**
	 * Backticks columns, tables, etc.
	 *
	 * @access public
	 * @param string $var
	 * @param boolean $tick
	 * @return string
	 */
	public function backtick($var, $tick = true) {
		if(strpos($var, '+') || strpos($var, '(') || strpos($var, 'NOT LIKE')) {
			$tick = false;
		}
		$var = strval(trim($var));
		
		if (strpos($var, '.') !== false && $tick) {
			$v = explode('.', $var);
			$var  = "`". $v[0] ."`.";
			$var .= ($v[1] == '*') ? '*' : "`". $v[1] ."`";
		} else {
			$var = ($tick === true) ? "`$var`" : $var;
		}
		
		return $var;
	}
	
	/**
	 * Binds a paramater to the sql string.
	 *
	 * @access public
	 * @param string $sql
	 * @param array $params
	 * @param boolean $clean 
	 * @return string
	 */ 
	public function bind($sql, $params, $clean = true) {
		if (!empty($params) && !empty($sql)) {
			if (is_array($params)) {
				foreach ($params as $param => $value) {
					if (is_string($param) && isset($value)) {
						$param = ':'. trim($param, ':') .':';

						if (!preg_match('/^[_A-Z0-9]+\((.*)\)/', $value) && $clean === true) {
							$value = $this->clean($value);
						}

						$sql = str_replace($param, trim($value), $sql);
					}
				}
			} else {
				trigger_error('Database::bind(): Params given are not an array', E_USER_WARNING); 
			}
		}
		
		return $sql;
	}
	
	/**
	 * Cleans an sql string to prevent unwanted injection.
	 *
	 * @access public
	 * @param string $value
	 * @return string
	 */
	public function clean($value) {
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		if (function_exists('mysql_real_escape_string')) {
			$value = mysql_real_escape_string($value, $this->__connection);
		} else {
			$value = mysql_escape_string($value);
		}
		
		return $value;
	}
	
	/**
	 * Count the number of returned rows from the query result.
	 *
	 * @access public
	 * @param result $query
	 * @return int
	 */
	public function countRows($query) {
		return intval(mysql_num_rows($query));
	}
	
	/**
	 * Creates a database table based on the schema array.
	 *
	 * @access public
	 * @param string $tableName
	 * @param array $schema
	 * @param array $settings - Merges with defaults
	 * @return boolean
	 */
	public function create($tableName, $schema, $settings = array()) {
		$defaults = array(
			'engine' 	=> 'InnoDB',
			'charset'	=> 'utf8',
			'collate'	=> 'utf8_general_ci',
			'comment'	=> '',
			'increment'	=> 1
		);
		
		$keys = $sql = array();
		$settings = array_merge($defaults, $settings);
		$isDateTime = false;
		
		// Build schema
		if (!empty($schema)) {
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
		
			$sql[] = "CREATE TABLE IF NOT EXISTS ". $this->backtick($tableName) ." (";
			
			foreach ($schema as $field => $data) {
				$column = "\t". $this->backtick($field);
				
				if (empty($data['type'])) {
					$data['type'] = 'text';
				}
				
				if (empty($data['length'])) {
					$data['length'] = ($data['type'] == 'string' || $data['type'] == 'text') ? 255 : 10;
				}
				
				// Integers
				if ($data['type'] == 'integer' || $data['type'] == 'int') {
					if (empty($data['length'])) {
						$column .= " INT(10)";
					} else {
						if ($data['length'] <= 3) {
							$column .= " TINYINT(3)";
						} else if ($data['length'] <= 5) {
							$column .= " SMALLINT(5)";
						} else if ($data['length'] <= 7) {
							$column .= " MEDIUMINT(7)";
						} else if ($data['length'] <= 10) {
							$column .= " INT(10)";
						} else {
							$column .= " BIGINT(25)";
						}
					}
					
					// Unsigned, Zerofill
					if (isset($data['options']['unsigned']) && $data['options']['unsigned'] === true) {
						$column .= " UNSIGNED";
					
						if (isset($data['options']['zerofill']) && $data['options']['zerofill'] === true) {
							$column .= " ZEROFILL";
						}
					}
					
					// Auto increment
					if (isset($data['options']['auto_increment']) && $data['options']['auto_increment'] === true) {
						$column .= " AUTO_INCREMENT";
					}
				
				// Strings
				} else if ($data['type'] == 'string' || $data['type'] == 'text') {
					if ($data['length'] <= 255) {
						$column .= " VARCHAR(". $data['length'] .")";
					} else {
						$column .= " TEXT";
					}
				
				// Enum
				} else if ($data['type'] == 'enum') {
					if (is_array($data['length'])) {
						$opts = array();
						foreach ($data['length'] as $opt) {
							$opts[] = "'". $opt ."'";
						}
						$column .= " ENUM(". implode(', ', $opts) .")";
					}
				
				// Datetime
				} else if ($data['type'] == 'datetime' || $data['type'] == 'timestamp' || $data['type'] == 'date' || $data['type'] == 'time' || $data['type'] == 'float' || $data['type'] == 'blob') {
					$isDateTime = ($data['type'] == 'blob') ? false : true;
					$column .= " ". strtoupper($data['type']);
					
				// Year
				} else if ($data['type'] == 'year') {
					$column .= " YEAR(4)";
				}
				
				if (isset($data['type'])) {
					// Null
					if (!isset($data['options']['auto_increment']) && $data['options']['null'] === true) {
						$column .= " NULL";
					} else {
						$column .= " NOT NULL";
					}
					
					// Default
					if ($data['type'] == 'enum') {
						if (isset($data['options']['default']) && in_array($data['options']['default'], $data['length'])) {
							$default = $data['options']['default'];
						} else {
							$default = $data['length'][0];
						}
						$column .= " DEFAULT '". $default ."'";
					} else if (isset($data['options']['default']) && !isset($data['options']['auto_increment'])) {
						$column .= " DEFAULT '". $this->__encode($data['options']['default']) ."'";
					}
					
					// Comment
					if (isset($data['options']['comment'])) {
						$column .= " COMMENT '". $this->__encode($data['options']['comment']) ."'";
					}
					
					// Keys
					if (isset($data['key'])) {
						if ($data['key'] == 'index') {
							$keys['index'][] = $field;
						} else if ($data['key'] == 'primary') {
							$keys['primary'] = $field;
						} else if ($data['key'] == 'unique') {
							$keys['unique'] = $field;
						}
					}
					
					$sql[] = $column;
				}
			}
			
			// Add keys
			if (!empty($keys)) {
				foreach ($keys as $key => $field) {
					if ($key == 'index') {
						foreach ($field as $index) {
							$sql[] = "\tKEY ". $this->backtick($index) ." (". $this->backtick($index) .")";
						}
					} else if ($key == 'primary') {
						$sql[] = "\tPRIMARY KEY (". $this->backtick($field) .")";
					} else if ($key == 'uniqe') {
						$sql[] = "\tUNIQUE KEY (". $this->backtick($field) .")";
					}
				}
			}
			
			// Add settings
			$closer = ")";
			foreach ($settings as $field => $setting) {
				if ($field == 'engine') {
					$closer .= " ENGINE=". $setting;
				} else if ($field == 'charset') {
					$closer .= " DEFAULT CHARSET=". $setting;
				} else if ($field == 'comment') {
					$closer .= " COMMENT='". $this->__encode($setting) ."'";
				} else if ($field == 'increment') {
					$closer .= " AUTO_INCREMENT=". intval($setting);
				} else if ($field == 'collate') {
					$closer .= " COLLATE=". $this->__encode($setting);
				}
			}
			$closer .= ";";
			
			$sql[] = $closer;
			$sql = implode("\n", $sql);
			
			return $this->execute($sql, $dataBit);	
		}
	}
	
	/**
	 * Turn debug on or off.
	 *
	 * @access public
	 * @param boolean $status
	 * @return void
	 */
	public function debug($status = true) {
		if (is_bool($status)) {
			$this->__debug = $status;
		}
	}
	
	/**
	 * Builds a suitable SQL DELETE query and executes.
	 *
	 * @access public
	 * @param string $tableName
	 * @param array $conditions
	 * @param int $limit
	 * @return mixed
	 */
	public function delete($tableName, $conditions, $limit = 1) {		
		if (!empty($tableName) && !empty($conditions)) {
			$execute = true;
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
		
			if (is_array($conditions)) {
				$this->__buildConditions($dataBit, $conditions);
			} else {
				$execute = false;
				trigger_error('Database::delete(): Conditions/Where clause supplied must be an array', E_USER_WARNING);
			}
			
			if ($execute === true) {
				$sql = "DELETE FROM ". $this->backtick($tableName) ." WHERE ". $this->__formatConditions($this->__data[$dataBit]['conditions']);
				
				// Limit, offset
				if (isset($limit) && is_int($limit)) {
					$sql .= " LIMIT :limit:";
					$this->addBind($dataBit, 'limit', $limit);
				}
				
				$sql = $this->bind($sql, $this->__data[$dataBit]['binds']);
				return $this->execute($sql, $dataBit);
			}
		}
		
		return;
	}
	
	/**
	 * Describes a table (gets column information).
	 *
	 * @access public
	 * @param string $tableName
	 * @return boolean
	 */
	public function describe($tableName) {
		if (!empty($tableName)) {
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
			
			$sql = "DESCRIBE ". $this->backtick($tableName);
			
			$rows = array();
			if ($query = $this->execute($sql, $dataBit)) {
				while ($row = $this->fetchAll($query)) {
					$rows[] = $row;
				}
			}
			
			return $rows;
		}
		
		return;
	}
	
	/**
	 * Drops a table (completely removes a table and all its rows).
	 *
	 * @access public
	 * @param string $tableName
	 * @return boolean
	 */
	public function drop($tableName) {		
		if (!empty($tableName)) {
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
			
			$sql = "DROP TABLE ". $this->backtick($tableName);
			return $this->execute($sql, $dataBit);
		}
		
		return;
	}

	/**
	 * Executes the sql statement after being prepared and binded.
	 *
	 * @access public
	 * @param string $sql
	 * @param int $dataBit
	 * @return mixed
	 */
	public function execute($sql, $dataBit = null) {
		// re select db
		$this->__reselectDb();
		
		if (empty($dataBit)) {
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
		}
		
		$result = mysql_query($sql, $this->__connection);

		if ($result === false) {
			$failure = mysql_error() .'. ('. mysql_errno() .')';
			trigger_error('SQL: ' . $sql . ' Database::execute(): '. $failure, E_USER_ERROR);
		} else {
			++$this->__executed;
		}
		
		if ($this->__debug === true) {
			$this->__queries[] = array(
				'statement' => $sql,
				'executed'  => (isset($failure)) ? $failure : 'true',
				'took'		=> $this->__endLoadTime($dataBit),
				'affected'	=> $this->getAffected()
			);
		}

		unset($this->__data[$dataBit]);
		return $result;
	}
	
	public function query($sql, $cake = false) {
		$query = $this->execute($sql);
		$rows = array();
		if ($cake !== true) {
			while ($row = $this->fetchAll($query)) {
				$rows[] = $row;
			}
		} else {
			$this->resultSet($query);
			while ($row = $this->fetchCake($query)) {
				$rows[] = $row;
			}
		}
		return $rows;
	}
	
	function resultSet(&$results) {
		$this->map = array();
		$numFields = mysql_num_fields($results);
		$index = 0;
		$j = 0;

		while ($j < $numFields) {

			$column = mysql_fetch_field($results,$j);
			if (!empty($column->table)) {
				$this->map[$index++] = array($column->table, $column->name);
			} else {
				$this->map[$index++] = array(0, $column->name);
			}
			$j++;
		}
	}
	/**
	 * Fetches the first row from the query.
	 *
	 * @access public
	 * @param result $query
	 * @return array
	 */
	public function fetch($query) {
		while ($row = $this->fetchAll($query)) {
			return $row;
		}
	}
	
	/**
	 * Fetches cakephp style all rows from the query.
	 *
	 * @access public
	 * @param result $query
	 * @return array
	 */
	public function fetchCake($query) {
		if ($row = mysql_fetch_row($query)) {
			$resultRow = array();
			$i = 0;
			foreach ($row as $index => $field) {
				list($table, $column) = $this->map[$index];
				$resultRow[$table][$column] = $row[$index];
				$i++;
			}
			return $resultRow;
		} else {
			return false;
		}
	}
	/**
	 * Fetches all rows from the query.
	 *
	 * @access public
	 * @param result $query
	 * @return array
	 */
	public function fetchAll($query) {
		if ($this->__asObject === true) {
			$result = mysql_fetch_object($query);
		} else {
			$result = mysql_fetch_assoc($query);
		}
		
		return $result;
	} 
	
	/**
	 * Gets the previously affected rows.
	 *
	 * @access public
	 * @return int
	 */
	public function getAffected() {
		return intval(mysql_affected_rows());
	}
	
	/**
	 * Returns the total successful queries executed.
	 *
	 * @access public
	 * @return int
	 */
	public function getExecuted() {
		return intval($this->__executed);
	}
	
	/**
	 * Connects and returns a single instance of the database connection handle.
	 *
	 * @access public
	 * @param string $useDb
	 * @return instance
	 */
	public static function getInstance($useDb = 'default') {
		if (!isset(self::$__instance[$useDb])){
			self::$__instance[$useDb] = new Database();
			self::$__instance[$useDb]->__dbInstance = $useDb;
		}
		
		if (!empty($useDb) && self::$__instance[$useDb]->__db && !self::$__instance[$useDb]->__connection) {
			self::$__instance[$useDb]->__connect($useDb);
		}
		
		return self::$__instance[$useDb];
	}
	
	/**
	 * Gets the last inserted id from a query.
	 *
	 * @access public
	 * @return int
	 */
	public function getLastInsertId() {
		return intval(mysql_insert_id($this->__connection));
	} 
	
	/**
	 * Returns an array of queries that have been executed; used with debugging.
	 *
	 * @access public
	 * @return array
	 */
	public function getQueries() {
		return $this->__queries;
	}
	
	/**
	 * Builds a suitable SQL INSERT query and executes.
	 *
	 * @access public
	 * @param string $tableName
	 * @param array $columns
	 * @return mixed
	 */
	public function insert($tableName, $columns) {		
		if (!empty($tableName) && !empty($columns)) {
			$execute = true;
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
			
			if (is_array($columns)) {
				$this->__buildFields($dataBit, $columns, 'insert');
			} else {
				$execute = false;
				trigger_error('Database::insert(): Columns/Fields supplied must be an array', E_USER_WARNING);
			}

			if ($execute === true) {
				$sql = "INSERT INTO ". $this->backtick($tableName) ." (". implode(', ', $this->__data[$dataBit]['fields']) .") VALUES (". implode(', ', $this->__data[$dataBit]['values']) .")";
				$sql = $this->bind($sql, $this->__data[$dataBit]['binds']);

				if ($query = $this->execute($sql, $dataBit)) {
					return $this->getLastInsertId();
				}
			}
		}
		
		return;
	}
	
	// pagination
	public function paginate($tableName, $options = array()) {
		if(!isset($options['limit'])) {
			$options['limit'] = 20;
		}
		$dispatcher =& Dispatcher::getInstance();
		$helper =& Helper::getInstance();
		
		$page = $dispatcher->getArg('page');
		if(empty($page) || $page < 0) {
			$page = 1;
		}
		$options['offset'] = @(int)$options['limit'] * ($page - 1);
		$finder = 'all';
		
		// sort
		$sort = $dispatcher->getArg('sort');
		$direction = $dispatcher->getArg('direction');
		if(!empty($sort)) {
			if(!empty($direction)) {
				$direction = trim(strtoupper($direction));
				if($direction != 'ASC') {
					$direction = 'DESC';
				}
			} else {
				$direction = 'ASC';
			}
			$options['order'] = $sort . ' ' . $direction;
		}
		$counterOptions = $options;
		unset($counterOptions['limit']);
		$helper->pagination = array(
			'limit' => $options['limit'],
			'count' => $this->select('count', $tableName, $counterOptions),
		);
		return $this->select($finder, $tableName, $options);
		
	}
	
	/**
	 * A basic method to select data from a database; can either return many rows, one row, or a count.
	 *
	 * @access public
	 * @param string $finder
	 * @param string $tableName
	 * @param array $options - fields, conditions, order, group, limit, offset
	 * @return mixed
	 */
	public function select($finder, $tableName, $options = array()) {
		if (!empty($tableName)) {
			$execute = true;
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
			
			if (empty($finder)) {
				$finder = 'all';
			}
		
			// Table
			if (is_array($tableName)) {
				$tables = array();
				foreach ($tableName as $as => $table) {
					if (is_int($as)) $as = $table;
					$tables[] = $this->backtick($table) ." AS ". $this->backtick(ucfirst($as));
				}
				$table = implode(', ', $tables);
			} else {
				$table = $this->backtick($tableName);
			}
			
			// Joins
			$joinSql = null;
			if (isset($options['joins']) && !empty($options['joins'])) {
				if (is_array($options['joins'])) {
					foreach($options['joins'] as $key => $join) {
						switch(@$join['type']) {
							case 'left':
								$joinSql .= ' LEFT JOIN';
								break;
							case 'right':
								$joinSql .= ' RIGHT JOIN';
								break;
							default:
								$joinSql .= ' JOIN';
						}
						
						$joinSql .= ' ' . $this->backtick($join['table']) . ' AS ' . $this->backtick(ucfirst($key)) . ' ON (' . $join['on'] . ')';
						$tableName[$key] = $join['table'];
					}
				} else {
					$execute = false;
					trigger_error('Database::select(): Join clause supplied must be an array', E_USER_WARNING);
				}
			}
			
			// Fields
			if ($finder == 'list' && (empty($options['fields']) || !is_array($options['fields']))) {
				$options['fields'] = array('id', 'name');
			}
			if ($finder == 'count') {
				$fields = "COUNT(*) AS `count`";
			} else {
				if (!empty($options['fields']) && is_array($options['fields'])) {
					$this->__buildFields($dataBit, $options['fields'], 'select');
					$fields = implode(', ', $this->__data[$dataBit]['fields']);
				} else {
					if (is_array($tableName)) {
						$fields = array();
						foreach ($tableName as $as => $t) {
							if (is_int($as)) $as = $t;
							$fields[] = $this->backtick(ucfirst($as)) .".*";
						}
						$fields = implode(', ', $fields);
					} else {
						$fields = '*';
					}
				}
			}
			
			$sql = "SELECT ". $fields ." FROM ". $table . $joinSql;
			
			// Conditions
			if (!empty($options['conditions'])) {
				if (is_array($options['conditions'])) {
					$this->__buildConditions($dataBit, $options['conditions']);
				} else {
					$execute = false;
					trigger_error('Database::select(): Conditions/Where clause supplied must be an array', E_USER_WARNING);
				}
				
				$sql .= " WHERE ". $this->__formatConditions($this->__data[$dataBit]['conditions']);
			}
			
			// Group
			if (!empty($options['group'])) {
				if (is_array($options['group'])) {
					$groups = array();
					foreach ($options['group'] as $group) {
						$groups[] = $this->backtick($group);
					}
					$group = implode(', ', $groups);
				} else {
					$group = $this->backtick($options['group']);
				}
				
				$sql .= " GROUP BY ". $group;
			}
			
			// Order
			if (!empty($options['order'])) {
				if (is_array($options['order'])) {
					$orders = array();
					foreach ($options['order'] as $column => $dir) {
						$orders[] = $this->backtick($column) ." ". strtoupper($dir);
					}
					$order = implode(', ', $orders);
					
					$sql .= " ORDER BY ". $order;
				} else if ($options['order'] == 'RAND()') {
					$sql .= " ORDER BY RAND()";
				} else {
					$sql .= " ORDER BY ". $options['order'];
				}
			}
			
			// Limit, offset
			if ($finder == 'first') {
				$options['limit'] = 1;
				$options['offset'] = NULL;
			}
			
			if (isset($options['limit']) && is_int($options['limit'])) {
				$sql .= " LIMIT ";
				
				if (isset($options['offset']) && is_int($options['offset'])) {
					$sql .= ":offset:,";
					$this->addBind($dataBit, 'offset', $options['offset']);
				}
				
				$sql .= ":limit:";
				$this->addBind($dataBit, 'limit', $options['limit']);
			}
			// Execute query and return results
			if ($execute === true) {
			     if (!isset($this->__data[$dataBit]['binds'])) {
                    $this->__data[$dataBit]['binds'] = null;
			     }
				$sql = $this->bind($sql, $this->__data[$dataBit]['binds']);
				$query = $this->execute($sql, $dataBit);
				
				if ($finder == 'count') {
					if ($fetch = $this->fetch($query)) {
						if ($this->__asObject === true) {
							return $fetch->count;
						} else {
							return $fetch['count'];
						}
					}
				} else if ($finder == 'first') {
					if (!isset($options['cake']) || $options['cake'] !== true) {
						return $this->fetch($query);
					} else {
						$this->resultSet($query);
						return $this->fetchCake($query);
					}
				} else if ($finder == 'list') {
					$rows = array();
					$i = 0;
					while ($row = $this->fetchAll($query)) {
						if (count($row) == 1) {
							reset($row);
							$value = current($row);
							$key = $i;
						} else {
							reset($row);
							$key = current($row);
							$value = next($row);
						}
						$rows[$key] = $value;
						$i++;
					}
					
					return $rows;
				} else {
					$rows = array();
					if (!isset($options['cake']) || $options['cake'] !== true) {
						while ($row = $this->fetchAll($query)) {
							$rows[] = $row;
						}
					} else {
						$this->resultSet($query);
						while ($row = $this->fetchCake($query)) {
							$rows[] = $row;
						}
					}
					
					return $rows;
				}
			}
		}
		
		return;
	}
	
	/**
	 * Stores database connection and login info.
	 *
	 * @access public
	 * @param string $db
	 * @param string $server
	 * @param string $database
	 * @param string $username
	 * @param string $password
	 * @return boolean
	 */
	public static function store($db, $server, $database, $username, $password) {
		self::getInstance($db)->__db = array(
			'server'	=> $server,
			'database'	=> $database,
			'username'	=> $username,
			'password'	=> $password
		);
		
		unset($password);
		return true;
	}
	
	/**
	 * Truncates a table (empties all data and sets auto_increment to 0).
	 *
	 * @access public
	 * @param string $tableName
	 * @return boolean
	 */
	public function truncate($tableName) {
		if (!empty($tableName)) {
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
			
			$sql = "TRUNCATE TABLE ". $this->backtick($tableName);
			return $this->execute($sql, $dataBit);
		}
		
		return;
	}

	/**
	 * Builds a suitable SQL UPDATE query and executes.
	 *
	 * @access public
	 * @param string $tableName
	 * @param array $columns
	 * @param array $conditions
	 * @param int $limit
	 * @return result
	 */
	public function update($tableName, $columns, $conditions, $limit = 1) {
		if (!empty($tableName) && !empty($columns) && !empty($conditions)) {
			$execute = true;
			$dataBit = microtime();
			$this->__startLoadTime($dataBit);
			if($limit) {
				$this->addBind($dataBit, 'limit', intval($limit));
			}
			// Create columns => value
			if (is_array($columns)) {
				$this->__buildFields($dataBit, $columns, 'update');
			} else {
				$execute = false;
				trigger_error('Database::update(): Columns/Fields supplied must be an array', E_USER_WARNING);
			}
			
			// Build the where clause
			if (is_array($conditions)) {
				$this->__buildConditions($dataBit, $conditions);
			} else {
				$execute = false;
				trigger_error('Database::update(): Conditions/Where clause supplied must be an array', E_USER_WARNING);
			}
			
			if ($execute === true) {
				$sql = "UPDATE ". $this->backtick($tableName) ." SET ". implode(', ', $this->__data[$dataBit]['fields']) ." WHERE ". $this->__formatConditions($this->__data[$dataBit]['conditions']);
				if($limit) {
					$sql .= " LIMIT :limit:";
				}
				$sql = $this->bind($sql, $this->__data[$dataBit]['binds']);
				
				return $this->execute($sql, $dataBit);
			}
		}
		
		return;
	}
	
	/**
	 * Builds the data array for the specific SQL.
	 *
	 * @access private
	 * @param int $dataBit
	 * @param array $columns
	 * @param string $type
	 * @return void
	 */
	private function __buildFields($dataBit, $columns, $type = 'select') {
		switch ($type) {
			case 'update':
				foreach ($columns as $column => $value) {
					if (is_numeric($column)) {
						$this->__data[$dataBit]['fields'][] = $value;
					} else {
						$this->__data[$dataBit]['fields'][] = $this->backtick($column) ." = ". $this->__formatType($value, $column);
						$this->addBind($dataBit, $column, $value);
					}
				}
			break;
			
			case 'insert':
				foreach ($columns as $column => $value) {
					$this->__data[$dataBit]['fields'][] = $this->backtick($column);
					$this->__data[$dataBit]['values'][] = $this->__formatType($value, $column);
					$this->addBind($dataBit, $column, $value);
				}
			break;
			
			case 'select':
				foreach ($columns as $column) {
					if (strpos(strtoupper($column), ' AS ') !== false) {
						$column = str_replace(' as ', ' AS ', $column);
						$parts = explode('AS', $column);
						$this->__data[$dataBit]['fields'][] = $this->backtick(trim($parts[0])) .' AS '. $this->backtick(trim($parts[1]));
					} else {
						$this->__data[$dataBit]['fields'][] = $this->backtick($column);
					}
				}
			break;
		}
	}
	
	/**
	 * Builds the data array conditions for the SQL.
	 *
	 * @access private
	 * @param int $dataBit
	 * @param array $conditions
	 * @param string $join
	 * @return void
	 */
	private function __buildConditions($dataBit, $conditions, $join = '') {
		$data = array();
		
		foreach ($conditions as $column => $clause) {
			if (is_numeric($column)) {
				$data[] = $clause;
				//break;
			}
			if (is_array($clause) && (in_array($column, array('OR', 'AND', 'NOT')) || !empty($join))) {
				$data[$column] = $this->__buildConditions($dataBit, $clause, $column);
				
			} else {
				$operators = array('=', '!=', '>', '>=', '<=', '<', '<>', 'LIKE', 'NOT LIKE', 'IS NULL', 'IS NOT NULL', 'IN', 'NOT IN');
				$operator = trim(strstr($column, ' '));
				$value = $clause;
				
				if (in_array($operator, $operators)) {
					$operator = trim($operator);
					$length = (strlen($column) - strlen($operator));
					$column = trim(substr($column, 0, $length));
				} else {
					$operator = '=';
				}
				
				// Is a column
				if (!is_array($value) && preg_match('/^[_a-zA-Z0-9]+\.[_a-zA-Z0-9]+$/i', $value)) {
					$valueClean = $this->backtick($value);
					
				// IN, array
				} else if (is_array($value)) {
					if(empty($value)) {
						continue;
					}
					$values = array();
					foreach ($value as $x => $val) {
						$key = $this->addBind($dataBit, 'where_'. $x . $column, $val);
						$values[] = $this->__formatType($val, trim($key, ':'));
					}
					$valueClean = '('. implode(', ', $values) .')';
					if ($operator == '=') {
						$operator = 'IN';
					}
					
				// NULL, NOT NULL
				} else if (in_array($operator, array('IS NULL', 'IS NOT NULL'))) {
					$valueClean = '';
					
				} else {
					if (is_numeric($column)) {
						break;
					}
					$key = $this->addBind($dataBit, 'where_'. $column, $value);
					$valueClean = $this->__formatType($value, trim($key, ':'));
				}
				
				$data[] = $this->backtick($column) ." ". $operator ." ". $valueClean;
			}
		}
		
		$this->__data[$dataBit]['conditions'] = $data;
		return $data;
	}

	/**
	 * Attempts to connect to the MySQL database.
	 *
	 * @access public
	 * @param string $useDb
	 * @return boolean
	 */
	private function __connect($useDb) {
		$connect = ($this->__persistent === true) ? 'mysql_pconnect' : 'mysql_connect';
		Database::$__useDb = $useDb;
		$this->__queries = array();
		$this->__executed = 0;
		$this->__connection = $connect($this->__db['server'], $this->__db['username'], $this->__db['password']);
	
		if ($this->__connection) {
			if (!mysql_select_db($this->__db['database'], $this->__connection)) {
				trigger_error('Database::connect(): '. mysql_error() .'. ('. mysql_errno() .')', E_USER_ERROR); 
			}
		}
		
		unset($this->__db['password']);
		return $this->__connection;
	}

	/**
	 * Attempts to reselect database the MySQL database.
	 *
	 * @access public
	 * @return void
	 */
	private function __reselectDb() {
		if ($this->__dbInstance != Database::$__useDb) {
			if (!mysql_select_db($this->__db['database'], $this->__connection)) {
				trigger_error('Database::connect(): '. mysql_error() .'. ('. mysql_errno() .')', E_USER_ERROR); 
			} else {
				Database::$__useDb = $this->__dbInstance;
			}
		}
	}
	
	/**
	 * Strips html and encodes the string.
	 *
	 * @access private
	 * @param string $value
	 * @return string
	 */
	private function __encode($value) {
		return strval(htmlentities(strip_tags($value)));
	}
	
	/**
	 * If a mysql function is used, encode it!
	 *
	 * @access private
	 * @param string $value
	 * @return string
	 */
	private function __encodeMethod($value) {
		if (strtoupper($value) == $value && substr($value, -2) == '()') {
			return strval($value);
		} else {
			$function = substr($value, 0, strpos($value, '('));
			preg_match('/^[_A-Z0-9]+\((.*)\)/', $value, $matches);
			
			if (!empty($matches)) {
				$params = array_map('trim', explode(',', $matches[1]));
				$cleaned = array();
				
				foreach ($params as $param) {
					if (substr($param, 0, 1) == "'" && substr($param, -1) == "'") {
						$param = trim($param, "'");
						if (empty($param)) {
							$param = "''";
						} else {
							$param = "'". $this->clean($param) ."'";
						}
					} else {
						if (is_int($param)) {
							$param = intval($this->clean($param));
						} else {
							$param = $this->backtick($param);
						}
					}
					$cleaned[] = $param;
				}
				
				return strval($function) ."(". implode(', ', $cleaned) .")";
			} else {
				return strval($function) ."()";
			}
		}
	}
	
	/**
	 * Determines the column values type.
	 *
	 * @access private
	 * @param mixed $value
	 * @param string $column
	 * @param string $prefix
	 * @return mixed
	 */
	private function __formatType($value, $column, $prefix = '', $checkFunction = true) {
		// NULL
		if (($value === NULL || $value === 'NULL') && $value !== 0) {
			$cleanValue = 'NULL';
		// Empty
		} else if ((empty($value) || !isset($value)) && $value !== 0) {
			$cleanValue = "''";
			
		// NOW(), etc
		} else if ($checkFunction && preg_match('/^[_A-Z0-9]+\((.*)\)/', $value)) {
			if (in_array($value, $this->__mysqlFunctions)) {
				$cleanValue = $this->__encodeMethod($value);
			} else {
				$cleanValue = $this->__formatType($value, $column, $prefix, false);
			}
		// Boolean
		} else if (is_bool($value)) {
			$cleanValue = (bool)$value;
			
		// Strings
		} else if (is_string($value) && strlen($value) > 0) {
			$cleanValue = "':". $prefix . $column .":'";
			
		// Integers, Numbers
		} else if (is_numeric($value) || is_int($value)) {
			$cleanValue = ":". $prefix . $column .":";
			
		}
		
		return $cleanValue;
	}
	
	/**
	 * Formats the joins for the conditions.
	 *
	 * @access private
	 * @param array $conditions
	 * @param string $operator
	 * @return string
	 */
	private function __formatConditions($conditions, $operator = 'AND') {
		$clean = array();
		
		foreach ($conditions as $op => $clause) {
			if (is_array($clause)) {
				$clean[] = '('. $this->__formatConditions($clause, $op) .')';
			} else {
				$clean[] = $clause;
			}
		}
		
		return implode(' '. $operator .' ', $clean);
	}
	
	/**
	 * Starts the timer for the query execution time.
	 *
	 * @access private
	 * @param int $dataBit
	 * @return void
	 */
	private function __startLoadTime($dataBit) {
		if ($this->__debug === true) {
			$time = explode(' ', $dataBit);
			$time = $time[1] + $time[0];
			$this->__data[$dataBit]['start'] = $time;
		}
	}
	
	/**
	 * Gets the final time in how long the query took.
	 *
	 * @access private
	 * @param int $dataBit
	 * @return int
	 */
	private function __endLoadTime($dataBit) {
		if ($this->__debug === true) {
			$time = explode(' ', microtime());
			$time = $time[1] + $time[0];
			
			return ($time - $this->__data[$dataBit]['start']);
		}
	}
	
	/**
	 * Disable clone from being used.
	 */	
	private function __clone() { }
	
	public function debugDump() {
		echo '<div style="overflow:scroll">';
		vd($this->__queries);
		echo '</div>';
		die;
	}
	
}
?>
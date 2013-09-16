package devarai.tools.db {
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import flash.events.MouseEvent;
	import flash.filters.BlurFilter;
	import flash.net.URLLoader;
	import flash.net.URLLoaderDataFormat;
	import flash.net.URLRequest;
	import flash.utils.escapeMultiByte;
	
	
	/**
	 * This is a controller class which provides methods for the backend communication.
	 */
	public class Controller extends EventDispatcher{
		
		/**
		 * Link back to main class.
		 */
		private var sc:Admin;
		
		/**
		 * Constructor.
		 */
		public function Controller(ad:Admin) {
			sc= ad;	
		}
		
		/**
		 * This method is called if the custom dictionaies should be refreshed through the PHP backend.
		 */
		public function refreshDicts(pw:String):void {
			
			var myDate:Date = new Date();
			var timestamp:uint = myDate.getTime();
			var myLoader:URLLoader = new URLLoader();
			myLoader.dataFormat = URLLoaderDataFormat.VARIABLES
			myLoader.load(new URLRequest(sc.phpPath+"tables.php?"+timestamp+"&pw="+escapeMultiByte(pw)));
			myLoader.addEventListener(Event.COMPLETE, onDataLoad)
			
		}
		
		/**
		 * This method is called if a word is inserted and/or a custom table has to be created the PHP backend.
		 */
		public function createInsert(pw:String, dbname:String, word:String = null,dbdesc:String = "none"):void {
			
			var myDate:Date = new Date();
			var timestamp:uint = myDate.getTime();
			var myLoader:URLLoader = new URLLoader();
			myLoader.dataFormat = URLLoaderDataFormat.VARIABLES;
			
			_status = "waiting";
			
			var path:String = sc.phpPath+"admin.php?"+timestamp+"&pw="+escapeMultiByte(pw)+"&desc="+escapeMultiByte(dbdesc)+"&db="+escapeMultiByte(dbname);
			
			if (word) {
				path = path+"&word="+escapeMultiByte(word.toLowerCase());
			
			}
			
			trace("create Insert..");
				
			myLoader.load(new URLRequest(path));
			myLoader.addEventListener(Event.COMPLETE, onDataLoad2)
			
		}
		
		/**
		 * This method is called if a word is to be searched in a custom table .
		 */
		public function search(pw:String, dbname:String, word:String = null):void {
			
			var myDate:Date = new Date();
			var timestamp:uint = myDate.getTime();
			var myLoader:URLLoader = new URLLoader();
			myLoader.dataFormat = URLLoaderDataFormat.VARIABLES;
			
			_status = "waiting";
			
			var path:String = sc.phpPath+"search.php?"+timestamp+"&pw="+escapeMultiByte(pw)+"&db="+escapeMultiByte(dbname);
			
			if (word) {
				path = path+"&word="+escapeMultiByte(word.toLowerCase());
				
			} else {
				_status = "No word given.";
				this.dispatchEvent(new Event("refresh"));
			}
			
			myLoader.load(new URLRequest(path));
			myLoader.addEventListener(Event.COMPLETE, onDataLoad2)
			
		}

		/**
		 * This method is triggered if a custom table is about to be deleted
		 */
		public function del(pw:String, dbname:String):void {
			
			var myDate:Date = new Date();
			var timestamp:uint = myDate.getTime();
			var myLoader:URLLoader = new URLLoader();
			myLoader.dataFormat = URLLoaderDataFormat.VARIABLES;
			
			_status = "waiting";
			
			var path:String = sc.phpPath+"delete.php?"+timestamp+"&pw="+escapeMultiByte(pw)+"&db="+escapeMultiByte(dbname);
			
			
			myLoader.load(new URLRequest(path));
			myLoader.addEventListener(Event.COMPLETE, onDataLoad2)
			
		}

		
		/**
		 * List of custom tables.
		 */
		private var tables:Array = new Array();
		public function get myTables():Array {
			return this.tables;
		}
		
		
		/**
		 * This method is triggered after the PHP answered.
		 */
		private function onDataLoad(evt:Event){
			
			if (String(evt.target.data.result)=="error") {
				this.dispatchEvent(new Event("passwordError"));
				return;
			}
			
			tables = new Array();
			
			for (var i:uint=0; i<evt.target.data.cant; i++){
				
				var inte:int = i+1;
				
				var arr:Array = new Array();
				
				arr.push(String(evt.target.data["name"+i]));
				arr.push(String(evt.target.data["desc"+i]));
				
				tables.push(arr);
				
					
				
			}
			this.dispatchEvent(new Event("refreshTable"));
			
		}
		
		
		public function get status():String {
			return this._status;
		}
		private var _status:String = "";
		
		/**
		 * This method is triggered after the PHP answered.
		 */
		private function onDataLoad2(evt:Event){
			
			var result:String = String(evt.target.data.result);
				
			if (result == "newInsert") {
				_status = "word added.";
			} else if (result == "already") {
				_status = "word already in the dictionary";
			} else if (result == "nothing") {
				_status = "nothing done.";
			} else if (result == "newTable") {
				_status = "created a new dictionary.";
			} else if (result == "error") {
				_status = "invalid password or dictionary";
				
			} else if (result == "doneDel") {
				_status = "deletion operation executed";
			} else if (result == "errorTable") {
				_status = "this custom dict does not exist!";
			}else if (result == "nowordGiven") {
				_status = "no valid search word given!";
			}else if (result == "notFound") {
				_status = "The search word was not found in the selected dictionary!";
			}else if (result == "wordFound") {
				_status = "The search word was found in the selected dictionary!";
			}
			
			this.dispatchEvent(new Event("refresh"));
			
		}
		
		
		
		
		
		
	}
	
	
	
}
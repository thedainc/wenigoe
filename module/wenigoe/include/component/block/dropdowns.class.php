<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Core
 * @version 		$Id: index-member.class.php 5908 2013-05-13 07:28:31Z Raymond_Benc $
 */
class User_Component_Block_Dropdowns extends Phpfox_Component 
{
	public function process()
	{
		$wService = Phpfox::getService('wenigoe');
		$birthday = $wService->getDob(Phpfox::getUserId());
		$iDob = $birthday;
		
		$this->template()->assign(array(
			'iDob' => $iDob,
		));
	}
}
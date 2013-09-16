<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class Wenigoe_Component_Controller_LegacyForm extends Phpfox_Component
{
    public function process()
    {
        $this->template()->setTitle('Wenigoe Settings');
        $this->template()->setBreadcrumb('My Legacy');
        $this->template()->setHeader('wenigoe.css','module_wenigoe');
        $this->template()->setHeader('wenigoe.js','module_wenigoe');

        $this->template()->setHeader('wenigoe.css','module_wenigoe');   
        $user_id = Phpfox::getUserId();
		
		$wService = Phpfox::getService('wenigoe');
		
		$username = $wService->getUsernameById($user_id);
		
		$legacy = $wService->getLegacy($user_id,$username);
		
		$aLegacy = $legacy[0];
		unset($aLegacy['user_id']);
		unset($aLegacy['username']);
		unset($aLegacy['id']);

        $this->template()->assign(array(
            'aUser_id' => $user_id,
            'aLegacy'  => $aLegacy,
			'aUsername' => $username
        ));
    }

}

?> 
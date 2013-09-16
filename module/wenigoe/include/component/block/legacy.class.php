<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		Wenigoe
 * @author  		Jesse Griffin
 * @package 		Wenigoe_Component
 */

class Wenigoe_Component_Block_Legacy extends Phpfox_Component
{
	public function process()
	{
		$wenigoeService = Phpfox::getService('wenigoe');
		
		$request = Phpfox::getLib('request');
		$req1 = $request->get('req1');
		if (empty($req1)) {
			$user_id = Phpfox::getUserId();
			$inUrl = false;
		} else {
			$username = $req1;
			$user_id = Phpfox::getService('wenigoe')->getUserIdByUsername($username);
			$inUrl = true;
		}
		if (empty($user_id)) {
			$user = Phpfox::getService('user')->getUserFields(true);
			$user_id = $user['user_id'];
			$inUrl = false;
		}
		
		$aLegacy = $wenigoeService->getLegacy($user_id,$username);
		
		foreach($aLegacy as $item) {
            if (!empty($item) || trim($item) !== "") {
                $fLegacy[] = $item;
            }
        }
		
		$this->template()->assign(array(
			'aLegacy' => $fLegacy[0],
			'userId' => $user_id,
			'onProfilePage' => $inUrl
		));
	}
}
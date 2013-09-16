<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jesse
 * Date: 7/13/13
 * Time: 9:17 AM
 * To change this template use File | Settings | File Templates.
 */

class Wenigoe_Component_Controller_Index extends Phpfox_Component
{
    public function process()
    {
        $this->template()->setTitle('Wenigoe Settings');
        $this->template()->setBreadcrumb('Wenigoe Settings');
        $this->template()->setHeader('wenigoe.css','module_wenigoe');
        $this->template()->setHeader('wenigoe.js','module_wenigoe');

        $this->template()->setHeader('wenigoe.css','module_wenigoe');
		
		$wService = Phpfox::getService('wenigoe');
		
		$user_id = Phpfox::getUserId();
        $username = $wService->getUsernameById($user_id);

        $bucketlist = $wService->getBucketlist($user_id);
		$legacy = $wService->getLegacy($user_id,$username);
        $favs = $wService->getFavorites($user_id);

		$this->template()->assign(array(
			'aLegacy' => $legacy[0]
		));
		
        foreach($bucketlist as $item) {
            if (!empty($item) || trim($item) !== "") {
                $fBucketlist[] = $item;
            }
        }
        $bucketlist = $fBucketlist;
        $this->template()->assign(array(
            'aBucketlist' => $bucketlist[0],
            'aFavs'       => $favs[0],
            'messages'    => Phpfox::getMessage()
        ));

        $params = $this->url()->getParams();
        $this->template()->assign('aParam',$params);

        $userid = $wService->getUserIdByUsername('snipertomcat');
        $this->template()->assign('aUserId',$userid);
    }
}
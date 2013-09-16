<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class Wenigoe_Component_Controller_Form extends Phpfox_Component
{

    public function process()
    {
        $user_id = Phpfox::getUserId();
		
        $currentBucketlist = Phpfox::getService('wenigoe')->getBucketlist($user_id);

        if (!$currentBucketlist) {
            $currentBucketlist = "null";
        } else {
            $currentBucketlist = $currentBucketlist[0];
        }

		if ($currentBucketlist !== "null") {
			$aItems = array();

			foreach($currentBucketlist as $key=>$val) {
				if (substr($key,0,4) == "item") {
					$aItems[$key] = $val;
				}
			}
		} else {
			$aItems = "null";
		}

        $this->template()->assign(array(
            'aUser_id' => $user_id,
            'aItems'  => $aItems,
        ));
    }

}

?> 
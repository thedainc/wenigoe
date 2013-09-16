<?php

class Wenigoe_Component_Controller_Process extends Phpfox_Component
{
    public function process()
    {
        if (($aVal = $this->request()->getArray('val'))) // getArray() method of request class returns all values from form
        {
            // NOTE: You can add here the validation of $aVal before submitting
            if (isset($aVal['user_id'])) {
                if (Phpfox::getService('wenigoe')->setBucketlist($aVal)) // updates items in bucketlist table
                {
                    $this->url()->send('wenigoe.index', null, 'Bucketlist has been saved'); // if is added we can use the class URL for go to "addedwithsuccess" view and show message "Added with success"
                } else {
                    $this->url()->send('wenigoe.index', null, 'Error');
                }
            }
        } elseif (($lVal = $this->request()->getArray('legacyVal'))) {
			if (isset($lVal['user_id'])) {
				if (Phpfox::getService('wenigoe')->setLegacy($lVal))
				{
					$this->url()->send('wenigoe.index', null, 'Legacy has been saved');
				} else {
					$this->url()->send('wenigoe.index', null, 'Error');
				}
			}
		}
    }
}
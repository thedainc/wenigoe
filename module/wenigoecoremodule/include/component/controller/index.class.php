<?php

class Wenigoecoremodule_Component_Controller_Index extends Phpfox_Component
{
	public function process()
	{
		$this->template()->setTitle("Wenigoe Core Module Index Page");
		$this->template()->setBreadcrumb("Sample Breadcrumb");
		$this->template()->setMeta('keywords','Wenigoe, dying, casket, burial');
		$this->template()->setMeta('description','Wenigoe, I want to be remebered');
		
		$this->template()->assign('sSampleVariable','Hello, This is an assigned variable');
		$this->template()->assign(array(
			'sSampleKey1' => 'Sample Value 1',
			'sSampleKey2' => 'Sample Value 2',
			'sSampleKey3' => 'Sample Value 3',
			'sSampleKey4' => 'Sample Value 4'
			)
		);
		
		$this->template()->setHeader(array(
			'sample.css' => 'module_wenigoecoremodule',
			'sample.js'	 => 'module_wenigoecoremodule'
			)
		);
		
		$aUsers = Phpfox::getService('wenigoecoremodule')->getUsers(10);
		$this->template()->assign('aUsers',$aUsers);
		
		$user_id = Phpfox::getUserId();
		$this->template()->assign('user_id',$user_id);
		$bucketlist = Phpfox::getService('wenigoecoremodule')->getBucketlist($user_id);
		$this->template()->assign(array(
				'bl1' => $bucketlist['item1']
			)
		);
	}
}

?>
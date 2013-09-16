<?php

class Wenigoecoremodule_Component_Block_Panel extends Phpfox_Component
{
	public function process()
	{
		$this->template()->assign(array(
			'sHeader' => 'Bucketlist',
			'aFooter' => array(
				'Update' => $this->url()->makeUrl('wenigoecoremodule.add')
				),
			)
		);
		$user_id = Phpfox::getUserId();
		$bucketlist = Phpfox::getService('wenigoecoremodule')->getBucketlist($user_id);
		$this->template()->assign(array(
				'bl1' => $bucketlist['item1'],
				'bl2' => $bucketlist['item2'],
				'bl3' => $bucketlist['item3'],
				'bl4' => $bucketlist['item4'],
				'bl5' => $bucketlist['item5'],
				'bl6' => $bucketlist['item6'],
				'bl7' => $bucketlist['item7'],
				'bl8' => $bucketlist['item8'],
				'bl9' => $bucketlist['item9']
			)
		);
		return 'block';
	}
}

?>
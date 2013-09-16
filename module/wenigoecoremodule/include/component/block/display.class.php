<?php

class Wenigoecoremodule_Component_Block_Display extends Phpfox_Component
{
	public function process()
	{
		$this->template()->assign('item1','hello');
	}
}
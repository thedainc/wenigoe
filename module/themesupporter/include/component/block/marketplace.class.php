<?php

class Themesupporter_Component_Block_Marketplace extends Phpfox_Component {
    public function process() {
        $aRecords = Phpfox::getService('themesupporter.marketplace')->get();
        if (count($aRecords) > 0 ) {
            $this->template()
                ->assign(array(
                'aRecords' => $aRecords,
            ));
            return 'block';
        }
        else {
            $this->template()->assign('aRecords', array());
        }
    }
}
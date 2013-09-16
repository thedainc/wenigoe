<?php
class Themesupporter_Component_Block_Event extends Phpfox_Component {
    public function process() {
        $aRecords = Phpfox::getService('themesupporter.event')->get();
        if (count($aRecords) >0 ){
            $this->template()
                ->assign(array(
                'aRecords' => $aRecords
            ));
            return 'block';
        }
        else {
            $this->template()->assign('aRecords', array());
        }
    }
}
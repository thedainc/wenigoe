<?php
class Themesupporter_Component_Block_Blog extends Phpfox_Component {
    public function process() {
        $aRecords = Phpfox::getService('themesupporter.blog')->get();
        if (count($aRecords) > 0 ) {
            $this->template()
                ->assign(array(
                'aRecords' => $aRecords,
                'iShorten' => Phpfox::getParam('themesupporter.block_blog_detail_length')
            ));
            return 'block';
        }
        else {
            $this->template()->assign('aRecords', array());
        }
    }
}
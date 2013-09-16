<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Hz
 * Date: 11/8/12
 * Time: 11:33 PM
 * To change this template use File | Settings | File Templates.
 */
class Themesupporter_Component_Block_Image extends Phpfox_Component
{
  public function process() {
    $aRecords = Phpfox::getService('themesupporter.image')->getNewImages();
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

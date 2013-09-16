<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Hz
 * Date: 11/8/12
 * Time: 11:35 PM
 * To change this template use File | Settings | File Templates.
 */
class Themesupporter_Service_Image_Image extends Phpfox_Service
{
  public function __construct() {
    $this->_sTable = Phpfox::getT('photo');
  }
  // get Images function
  public function getNewImages() {
    $iNumberPhotos = Phpfox::getParam('themesupporter.number_images_to_display');
    $sType = Phpfox::getParam('themesupporter.type_of_photo');
    switch ($sType){
      case ('All') : $sOrder = 'time_stamp';
        $sWhere = '1=1';
        break;
      case ("Most") : $sOrder = 'total_view';
        $sWhere = '1=1';
        break;
      case ("Featured") : $sOrder = 'time_stamp';
        $sWhere = 'p.is_featured=1';
      break;
    }

    $aRecords = $this->database()->select('p.*')
        ->from($this->_sTable, 'p')
        ->where($sWhere)
        ->order( $sOrder . ' DESC')
        ->limit($iNumberPhotos)
        ->execute('getRows');

    return $aRecords;
  }
}

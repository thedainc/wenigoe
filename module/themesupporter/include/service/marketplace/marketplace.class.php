<?php
class Themesupporter_Service_Marketplace_Marketplace extends Phpfox_Service {
    public function __construct() {
        $this->_sTable = Phpfox::getT('marketplace');
    }

    /**
     * get all blog
     * @return array
     */
    public function get() {
        $sType = Phpfox::getParam('themesupporter.marketplace_type');
        switch ($sType) {
            case 'Most Liked': $sOrder = "total_like desc";
                    $sWhere = '1 = 1';
                break;
            case 'Recent Marketplace': $sOrder = "time_stamp desc";
                    $sWhere = '1 = 1';
                break;
            case 'Featured Marketplace': $sOrder = 'time_stamp desc';
                    $sWhere = 'is_featured = 1';
                break;
        }
        $aRecords = $this->database()
            ->select('m.*')
            ->from($this->_sTable, 'm')
            ->order($sOrder)
            ->where($sWhere)
            ->limit(Phpfox::getParam('themesupporter.marketplace_number'))
            ->execute('getRows');

        return $aRecords;
    }
}
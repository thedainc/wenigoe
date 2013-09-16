<?php
class Themesupporter_Service_Video_Video extends Phpfox_Service {
    public function __construct() {
        $this->_sTable = Phpfox::getT('video');
    }

    public function get() {
        $sType = Phpfox::getParam('themesupporter.block_video_type');
        switch ($sType) {
            case 'Recently Uploaded Videos': $sOrder = 'time_stamp desc';
            break;
            case 'Most Viewed Videos':$sOrder = 'total_view desc';
            break;
            case 'Random Videos': $sOrder = 'rand()';
            break;
        }
        $aRecords = $this->database()
            ->select('v.*, u.user_name as user_name, u.full_name as full_name')
            ->from($this->_sTable, 'v')
            ->leftJoin(Phpfox::getT('user'), 'u', 'v.user_id = u.user_id')
            ->order($sOrder)
            ->limit(Phpfox::getParam('themesupporter.block_video_number'))
            ->execute('getRows');

        foreach ($aRecords as $iKey => $aRow)
        {
            $aRecords[$iKey]['link'] = Phpfox::permalink('video', $aRow['video_id'], $aRow['title']);
        }
        return $aRecords;
    }
    public function processRows(&$aRows)
    {


    }

    /**
     * Get random featured video
     * @return array
     */
    public function getRandomVideo()
    {
        $aRecord = $this->database()
            ->select('e.*')
            ->from(Phpfox::getT('video_embed'), 'e')
            ->leftJoin(Phpfox::getT('video'), 'v', 'v.video_id = e.video_id')
            ->where('v.is_featured = 1')
            ->order('rand()')
            ->execute('getRow');
        return $aRecord;
    }
}
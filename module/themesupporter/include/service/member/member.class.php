<?php
class Themesupporter_Service_Member_Member extends Phpfox_Service {
    public function __construct() {
        $this->_sTable = Phpfox::getT('user');
    }

    /**
     * get all info of user
     * @return array
     */
    public function get() {
        $sType = Phpfox::getParam('themesupporter.block_member_type');
        $sWhere = $sOrder = "";
        switch ($sType) {
            case 'Newest':
            case 'Latest':  $this->database()->order('u.joined desc');
                            break;
            case 'Recent':  $this->database()->order('u.last_login desc');
                            break;
            case 'Popular':
                            $this->database()->join(Phpfox::getT('user_field'), 'uf', 'uf.user_id = u.user_id')->order('uf.total_view desc');
                            break;
            case 'Online':  $iActiveSession = PHPFOX_TIME - (Phpfox::getParam('log.active_session') * 60);
                            $this->database()->join(Phpfox::getT('log_session'), 'ls', 'ls.user_id = u.user_id AND ls.last_activity > ' . $iActiveSession . (!defined('PHPFOX_IS_ADMIN_SEARCH') ? ' AND ls.im_hide = 0' : '') . '')->group('u.user_id');
                            break;
            case 'Top':     $this->database()->join(Phpfox::getT('user_activity'), 'ua', 'u.user_id = ua.user_id')->order('ua.activity_points desc');
                            break;
        }
        $aMembers = $this->database()
            ->select('u.*')
            ->from($this->_sTable, 'u')
            ->where('u.profile_page_id = 0')
            ->limit(Phpfox::getParam('themesupporter.block_member_number'))
            ->execute('getRows');

        return $aMembers;
    }

}
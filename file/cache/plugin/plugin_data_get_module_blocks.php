<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = '/**
 * Created by JetBrains PhpStorm.
 * User: ADMIN
 * Date: 12/26/12
 * Time: 3:50 PM
 * To change this template use File | Settings | File Templates.
 */
$sControllerName = Phpfox::getLib(\'module\')->getFullControllerName();
if ($sControllerName == \'profile.index\' && Phpfox::isMobile()) {
    $aFeedBlock = Phpfox::getService(\'bettermobile.template\')->getFeedDislay();
    if (!empty($aFeedBlock)) {
        if (isset($aBlocks[2]) && !empty($aBlocks[2]) && in_array("feed.display", $aBlocks[2])) {
        } else {
            $aBlocks[2][] = "feed.display";
        }
    }
}
$sBlocks = Phpfox::getService(\'bettermobile.template\')->getBlockOther(); '; ?>
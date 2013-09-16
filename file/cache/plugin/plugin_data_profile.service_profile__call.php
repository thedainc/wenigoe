<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = '/**
 * Created by JetBrains PhpStorm.
 * User: ADMIN
 * Date: 12/29/12
 * Time: 8:47 AM
 * To change this template use File | Settings | File Templates.
 */

if($sMethod == \'timeline\'){
    return false;
} if ($sMethod == \'timeline\') {
    Phpfox::getLib(\'template\')->assign(array(
        \'bOldVersion\' => true,
    ));
    return false;
} '; ?>
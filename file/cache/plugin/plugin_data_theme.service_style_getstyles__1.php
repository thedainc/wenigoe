<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'foreach ($aRows as $iKey => $aRow) {
    if ($aRow[\'theme_folder\'] == \'bettermobile\') {
        unset($aRows[$iKey]);
    }
} '; ?>
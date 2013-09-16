<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::isMobile() && isset($sBlocks)) {
    if(in_array($sKey, $sBlocks)){
        array_pop($aBlocks[$iId]);
    }
} '; ?>
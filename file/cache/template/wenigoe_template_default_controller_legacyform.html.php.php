<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:42 pm */ ?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('wenigoe.process'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>

    <div class="table">
        <div class="table_left">Build Legacy</div>
        <div class="table_right">
            <ul>
<?php if ($this->_aVars['aLegacy']): ?>
<?php if (count((array)$this->_aVars['aLegacy'])):  foreach ((array) $this->_aVars['aLegacy'] as $this->_aVars['iKey'] => $this->_aVars['aItem']): ?>
                    <li><?php echo $this->_aVars['iKey']; ?><input type="text" name="legacyVal[<?php echo $this->_aVars['iKey']; ?>]" size="90" id="<?php echo $this->_aVars['iKey']; ?>" <?php if ($this->_aVars['aItem']): ?> value="<?php echo $this->_aVars['aItem']; ?>" <?php endif; ?> /></li>
<?php endforeach; endif; ?>
<?php else: ?>
				<li>Most Memorable Moment:<input type="text" name="legacyVal[legacy_mem_mom]" size="90" id="legacy_mem_mom" /></li>
				<li>Moment You Wish You'de Forget:<input type="text" name="legacyVal[legacy_mom_forg]" size="90" id="legacy_mom_forg" /></li>
				<li>Most Memorable Person:<input type="text" name="legacyVal[legacy_mem_pers]" size="90" id="legacy_mem_pers" /></li>
				<li>Greatest Acheivment:<input type="text" name="legacyVal[legacy_grat_achiev]" size="90" id="legacy_grat_achiev" /></li>
				<li>Things I Want to Learn:<input type="text" name="legacyVal[legacy_things_learn]" size="90" id="legacy_things_learn" /></li>
				<li>Important Things to Share with Family:<input type="text" name="legacyVal[legacy_imp_shar_fam]" size="90" id="legacy_imp_shar_fam" /></li>
<?php endif; ?>
            </ul>
            <div class="clear"></div>
            <input type="hidden" name="legacyVal[user_id]" value="<?php echo $this->_aVars['aUser_id']; ?>"/>
			<input type="hidden" name="legacyVal[username]" value="<?php echo $this->_aVars['aUsername']; ?>"/>
            <input type="submit" value="update" class="button" name="legacyVal[update]" />
        </div>

</form>


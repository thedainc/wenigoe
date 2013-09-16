<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:23 pm */ ?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('wenigoe.process'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>

    <div class="table">
        <div class="table_left">Under The Hood</div>
        <div class="table_right">
			<table>
            <ul>
<?php if ($this->_aVars['aData']): ?>
<?php if (count((array)$this->_aVars['aData'])):  foreach ((array) $this->_aVars['aData'] as $this->_aVars['iKey'] => $this->_aVars['aItem']): ?>
                    <tr>
						<td><?php echo $this->_aVars['aItem']['name']; ?></td><td><input type="text" name="hoodVal[<?php echo $this->_aVars['iKey']; ?>]" size="90" id="<?php echo $this->_aVars['iKey']; ?>" <?php if ($this->_aVars['aItem']): ?> value="<?php echo $this->_aVars['aItem']['value']; ?>" <?php endif; ?> /></td>
					</tr>
<?php endforeach; endif; ?>
<?php else: ?>
				<!--<li>Item1:<input type="text" name="val[item1]" size="90" id="item1" /></li>
				<li>Item2:<input type="text" name="val[item2]" size="90" id="item2" /></li>
				<li>Item3:<input type="text" name="val[item3]" size="90" id="item3" /></li>
				<li>Item4:<input type="text" name="val[item4]" size="90" id="item4" /></li>
				<li>Item5:<input type="text" name="val[item5]" size="90" id="item5" /></li>
				<li>Item6:<input type="text" name="val[item6]" size="90" id="item6" /></li>
				<li>Item7:<input type="text" name="val[item7]" size="90" id="item7" /></li>
				<li>Item8:<input type="text" name="val[item8]" size="90" id="item8" /></li>
				<li>Item9:<input type="text" name="val[item9]" size="90" id="item9" /></li>-->
<?php endif; ?>
            </ul>
			</table>
            <div class="clear"></div>
            <input type="hidden" name="hoodVal[user_id]" value="<?php echo $this->_aVars['aUser_id']; ?>"/>
            <input type="submit" value="update" class="button" name="hoodVal[update]" />
        </div>

</form>


<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'block_id' => '181',
  'type_id' => '2',
  'ordering' => '2',
  'm_connection' => 'core.index-member',
  'component' => NULL,
  'location' => '1',
  'disallow_access' => 'a:1:{i:0;s:1:"5";}',
  'can_move' => '0',
  'module_id' => 'custom',
  'source_parsed' => '<?php /* Cached: July 25, 2013, 3:31 pm */ ?>
You like what we are doing?<br> Support us:<br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<?php echo \'<div><input type="hidden" name="\' . Phpfox::getTokenName() . \'[security_token]" value="\' . Phpfox::getService(\'log.session\')->getToken() . \'" /></div>\'; ?> 
<input type="hidden" name="cmd" value="_s-xclick"> 
<input type="hidden" name="hosted_button_id" value="7L4N7UJR7ZHHY"> 
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> 

</form>

Wenigoe.com<br> d.b.a. The Design Affiliates, Inc.',
); ?>
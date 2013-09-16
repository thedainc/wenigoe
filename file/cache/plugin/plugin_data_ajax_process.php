<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = '/**
 * Created by JetBrains PhpStorm.
 * User: ADMIN
 * Date: 11/30/12
 * Time: 11:38 AM
 * To change this template use File | Settings | File Templates.
 */ if (!empty($_POST) && Phpfox::getParam(\'feed.cache_each_feed_entry\') && PHPFOX_IS_AJAX)
{
	$oReq = Phpfox::getLib(\'request\');
	$oDb = Phpfox::getLib(\'database\');

		$aCoreCall = $oReq->getArray(\'core\');
		if (isset($aCoreCall[\'call\']))
		{
			switch ($aCoreCall[\'call\'])
			{
				case \'comment.updateText\':
					$aComment = $oDb->select(\'*\')
						->from(Phpfox::getT(\'comment\'))
						->where(\'comment_id = \' . (int) $oReq->get(\'comment_id\'))
						->execute(\'getSlaveRow\');
					if (isset($aComment[\'comment_id\']))
					{
						Phpfox::getService(\'feed.process\')->clearCache($aComment[\'type_id\'], $aComment[\'item_id\']);
					}
					break;
				case \'blog.moderation\':
					if ($oReq->get(\'action\') == \'delete\')
					{
						foreach ((array) $oReq->get(\'item_moderate\') as $iId)
						{
							Phpfox::getService(\'feed.process\')->clearCache(\'blog\', $iId);
						}
					}
					break;
			}
		}		
	
} '; ?>
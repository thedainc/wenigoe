<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Component
 * @version 		$Id: ping.class.php 5911 2013-05-13 08:28:38Z Raymond_Benc $
 */
class Video_Component_Controller_Ping extends Phpfox_Component
{
	private $_sOut = '';
	private $_bFail = false;
	
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		if (Phpfox::getParam('video.convert_servers_secret') != $this->request()->get('_v_secret'))
		{
			$this->p('Secret does not match', true);
		}
		else
		{
			if ($this->request()->get('_v_action'))
			{
				switch ($this->request()->get('_v_action'))
				{
					case 'completed':
						$iCnt = 0;
						foreach (Phpfox::getParam('video.convert_servers') as $sServer)
						{
							$iCnt++;
							if (md5($sServer) == $this->request()->get('url'))
							{							
								break;
							}
						}
						$sDest = '{' . $iCnt . '}' . $this->request()->get('name');

						$aVideo = Phpfox::getLib('database')->select('*')->from(Phpfox::getT('video'))->where('custom_v_id = ' . (int) $this->request()->get('id'))->execute('getSlaveRow');
						if (isset($aVideo['video_id']))
						{
							$aCallback = null;
							if ($aVideo['module_id'] != 'video' && Phpfox::hasCallback($aVideo['module_id'], 'convertVideo'))
							{
								$aCallback = Phpfox::callback($aVideo['module_id'] . '.convertVideo', $aVideo);
							}

							(Phpfox::isModule('feed') ? Phpfox::getService('feed.process')
								->callback($aCallback)
								->allowGuest()
								->add('video', $aVideo['video_id'], $aVideo['privacy'], $aVideo['privacy_comment'], $aVideo['item_id'], $aVideo['user_id']) : null);

							Phpfox::getLib('database')->update(Phpfox::getT('video'), array('in_process' => '0', 'destination' => $sDest, 'image_path' => $sDest . '.jpg'), 'custom_v_id = ' . (int) $this->request()->get('id'));
						}
						break;
					case 'canUpload':
						// Will add security checks later
						if (Phpfox::getService('video')->checkCustomHash($this->request()->get('hash_id')))
						{
							$this->p('All is good.');
						}
						else
						{
							$this->p('No token set for this upload.', true);
						}
						
						break;
					case 'getSettings':
						$aSettings = array();
						$aParams = array('video.covert_mp4_exec', 'video.covert_webm_exec', 'video.covert_ogg_exec', 'video.covert_mp4_image');
						foreach ($aParams as $sParam)
						{
							$aSettings[$sParam] = Phpfox::getParam($sParam);
						}
						$this->p($aSettings);
						break;
				}
			}
			else
			{
				$this->p('No action provided', true);
			}
		}		
		
		$this->output();
		exit();	
	}
	
	public function p($sOut, $bFail = false)
	{
		$this->_sOut = $sOut;
		$this->_bFail = $bFail;

		return $this;
	}
	
	public function output()
	{
		echo json_encode(array(
					'fail' => $this->_bFail,
					'output' => $this->_sOut
				)
			);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('video.component_controller_ping_clean')) ? eval($sPlugin) : false);
	}
}

?>
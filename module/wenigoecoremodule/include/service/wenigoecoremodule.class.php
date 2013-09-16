<?php

class Wenigoecoremodule_Service_Wenigoecoremodule extends Phpfox_Service
{
	public function getUsers($iTotal)
	{
		return $this->database()->select('u.full_name')
								->from(Phpfox::getT('user'),'u')
								->limit($iTotal)
								->execute('getRows');
	}
	
	public function getBucketlist($user_id)
	{
		$aRows = Phpfox::getLib('database')->select('*')
					->from('phpfox_bucketlist')
					->where("user_id = '$user_id'")
					->execute('getRows'); 
		return $aRows[0];
	}
	
	public function getUserIdByUsername($username)
	{
		$aRows = $this->database()->select('user_id')
			->from('phpfox_user')
			->where("user_name = '$username'")
			->execute('getRows');
		return $aRows[0];
	}	
}

?>
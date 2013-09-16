<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jesse
 * Date: 7/13/13
 * Time: 9:31 AM
 * To change this template use File | Settings | File Templates.
 */

class Wenigoe_Service_Wenigoe extends Phpfox_Service
{
    public function getUserIdByUsername($username)
    {
        $aRows = $this->database()->select('user_id')
            ->from('phpfox_user')
            ->where("user_name = '$username'")
            ->execute('getRows');
        return $aRows[0]['user_id'];
    }

    public function getUsernameById($user_id)
    {
        return $this->database()->select('user_name')
            ->from('phpfox_user')
            ->where("user_id = $user_id")
            ->execute('getRows');
    }

    public function getSelect($where) {
        return $this->database()->select("t2.*")
            ->from(Phpfox::getT('table2'),'t2')
            ->where($where)
            ->order('fc.ordering')
            ->execute('getRows');
    }

    public function setBucketlist($aVals)
    {
        /*        $this->database()->delete('phpfox_bucketlist',"user_id = ".$aVals['user_id']);
                return;*/
        $test = $this->database()->select("*")
            ->from('phpfox_bucketlist')
            ->where('user_id='.$aVals['user_id'])
            ->execute('getRows');
        if (!empty($test)) {
            return $this->database()->update(
                'phpfox_bucketlist',
                array(
                    'date' => date('Y-m-d'),
                    'item1' => $aVals['item1'],
                    'item2' => $aVals['item2'],
                    'item3' => $aVals['item3'],
                    'item4' => $aVals['item4'],
                    'item5' => $aVals['item5'],
                    'item6' => $aVals['item6'],
                    'item7' => $aVals['item7'],
                    'item8' => $aVals['item8'],
                    'item9' => $aVals['item9']
                ),
                'user_id='.$aVals['user_id']
            );
        } elseif (empty($test)) {
            return $this->database()->insert(
                'phpfox_bucketlist',
                array(
                    'id'   => null,
                    'user_id' => $aVals['user_id'],
                    'username' => $this->getUsernameById($aVals['user_id']),
                    'date' => date('Y-m-d'),
                    'item1' => $aVals['item1'],
                    'item2' => $aVals['item2'],
                    'item3' => $aVals['item3'],
                    'item4' => $aVals['item4'],
                    'item5' => $aVals['item5'],
                    'item6' => $aVals['item6'],
                    'item7' => $aVals['item7'],
                    'item8' => $aVals['item8'],
                    'item9' => $aVals['item9']
                )
            );
        }
    }

    public function getBucketlist($user_id)
    {
        return $this->database()->select('*')
            ->from('phpfox_bucketlist')
            ->where("user_id = $user_id")
            ->execute('getRows');
    }

    public function getMyThoughts($identifier)
    {
        if (is_array($identifier)) {
            $field = key($identifier);
            $search = $identifier[$field];
        } else {
            $field = 'username';
            $search = $identifier;
        }
        return $this->database()->select('*')
            ->from('phpfox_my_thoughts')
            ->where("$field = '$search'")
            ->execute('getRows');
    }

    public function getFavorites($identifier)
    {
        $username = $this->getUsernameById($identifier);
        return $username['username'];
        if (is_array($identifier)) {
            if (is_int(key($identifier))) {
                $username = $this->getUsernameById(key($identifier));
            }
            $field = key($identifier);
            $search = $username;
        } else {
            $field = 'username';
            if (is_int($identifier)) {
                $username = $this->getUsernameById($identifier);
                $search = $username;
            }
        }
        return $this->database()->select('*')
            ->from('phpfox_favs')
            ->where("$field = '$search'")
            ->execute('getRows');
    }

    public function getLegacy($user_id,$username)
    {
        return $this->database()->select('*')
            ->from('phpfox_legacy')
            ->where("user_id = '$user_id' OR username = '$username'")
            ->execute('getRows');
    }

    public function setLegacy($aVals)
    {
        $record_exists = $this->getLegacy($aVals['user_id'],$aVals['username']);
        if (empty($record_exists)) {
            $this->database()->insert(
                'phpfox_legacy',
                array(
                    'id' => null,
                    'user_id' => $aVals['user_id'],
                    'username' => $aVals['username'],
                    'legacy_mem_mom' => $aVals['legacy_mem_mom'],
                    'legacy_mom_forg' => $aVals['legacy_mom_forg'],
                    'legacy_mem_pers' => $aVals['legacy_mem_pers'],
                    'legacy_grat_achiev' => $aVals['legacy_grat_achiev'],
                    'legacy_things_learn' => $aVals['legacy_things_learn'],
                    'legacy_imp_shar_fam' => $aVals['legacy_imp_shar_fam'],
                )
            );
        } elseif (!empty($record_exists)) {
            $this->database()->update(
                'phpfox_legacy',
                array(
                    'legacy_mem_mom' => $aVals['legacy_mem_mom'],
                    'legacy_mom_forg' => $aVals['legacy_mom_forg'],
                    'legacy_mem_pers' => $aVals['legacy_mem_pers'],
                    'legacy_grat_achiev' => $aVals['legacy_grat_achiev'],
                    'legacy_things_learn' => $aVals['legacy_things_learn'],
                    'legacy_imp_shar_fam' => $aVals['legacy_imp_shar_fam'],
                ),
                "user_id = " . $aVals['user_id']
			);
        }
    }

    public function getAllWenigoeData($username)
    {
        $sql = "SELECT wu.*,
                l.*,
                f.*,
                t.*,
                b.*
                FROM phpfox_wenigoe_users wu
                LEFT JOIN phpfox_legacy l on l.username = wu.username
                LEFT JOIN phpfox_favs f on f.username = wu.username
                LEFT JOIN phpfox_my_thoughts t on t.username = wu.username
                LEFT JOIN phpfox_bucketlist b on b.username = wu.username
                WHERE wu.username = '$username'
        ";

        return $this->database()->query($sql)
            ->execute('getRows');
    }

    public function getDob($user_id)
    {
        return $this->database()->select('birthday')
            ->from('phpfox_user')
            ->where('user_id = '.(int)$user_id)
            ->execute('getRows');
    }

    public function calcAge($bday)
    {
        $newbday = substr($bday,4,4) . "-" . substr($bday,0,2) . "-" . substr($bday,2,2);
        $age = floor( (strtotime(date('Y-m-d')) - strtotime($newbday)) / 31556926);
        return $age;
    }

    public function getWenigoeUserData($user_id)
    {
        $uname = $this->getUsernameById($user_id);
        $username = $uname[0]['user_name'];
        //return $username;
        $array = $this->database()->select('ethnicity,blood_type,religion,children,childrens_children,armed_service,time_served,annuity_insurance')
            ->from('phpfox_wenigoe_users')
            ->where('username = "'.$username.'"')
            ->execute('getRows');
        return $array[0];
    }

}





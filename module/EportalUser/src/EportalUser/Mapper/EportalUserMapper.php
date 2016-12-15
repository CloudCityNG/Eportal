<?php


namespace EportalUser\Mapper;

/**
 * Description of EportalUserMapper
 *
 * @author imaleo
 */
class EportalUserMapper extends \ZfcUser\Mapper\User{
    protected $tableName = 'eportal_user';
    
    public function findByGender($gender){
        $select = $this->getSelect()
                ->where(array('gender = ?' => $gender));
        return $this->select($select);
    }
}

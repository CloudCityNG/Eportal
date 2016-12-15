<?php
namespace EportalUser\Mapper;

use EportalUser\Model\EportalUserInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Property\Model\JointPropertyValueInterface;

/**
 *
 * @author imaleo
 *        
 */
class UserJointPropertyValueMapper extends EportalAbstractDbMapper implements UserJointPropertyValueMapperInterface
{

    protected $tableName = 'user_joint_property_value';

    private $userTable = 'eportal_user';

    private $jpvTable = 'joint_property_value';

    private $userEntity;

    private $userHydrator;

    private $jpvEntity;

    private $jpvHydrator;

    public function findById($id)
    {
        $select = $this->getSelect()->where(array(
            'id = ?' => $id
        ));
        return $this->select($select)->current();
    }

    /**
     *
     * @see \EportalUser\Mapper\UserJointPropertyValueMapperInterface::getJointPropertyValues()
     *
     */
    public function getJointPropertyValues($user)
    {
        $select = $this->getSelect()
            ->join($this->jpvTable, $this->jpvTable . '.id = ' . $this->tableName . '.id')
            ->where(array(
            'user = ?' => $user
        ))
            ->columns(array());
        return $this->select($select, $this->jpvEntity, $this->jpvHydrator);
    }

    /**
     *
     * @see \EportalUser\Mapper\UserJointPropertyValueMapperInterface::exist()
     *
     */
    public function exist($user, $jointPropertyValue)
    {
        $select = $this->getSelect()->where(array(
            'user = ?' => $user,
            'joint_property_value = ?' => $jointPropertyValue
        ));
        $count = $this->select($select, $this->userEntity, $this->userHydrator)->count();
        return boolval($count);
    }

    /**
     *
     * @see \EportalUser\Mapper\UserJointPropertyValueMapperInterface::getUsers()
     *
     */
    public function getUsers($jointPropertyValue)
    {
        $select = $this->getSelect()
            ->join($this->userTable, 'user_id = ' . $this->tableName . '.user')
            ->where(array(
            'joint_property_value = ?' => $jointPropertyValue
        ))
            ->columns(array());
        return $this->select($select, $this->userEntity, $this->userHydrator);
    }

    public function setJointPropertyValueTable($jpvTable)
    {
        $this->jpvTable = $jpvTable;
        return $this;
    }

    public function getJointPropertyValueTable()
    {
        return $this->jpvTable;
    }

    public function setEportalUserTable($userTable)
    {
        $this->userTable = $userTable;
        return $this;
    }

    public function getEportalUserTable()
    {
        return $this->userTable;
    }

    public function setEportalUserEntity(EportalUserInterface $user)
    {
        $this->userEntity = $user;
        return $this;
    }

    public function getEportalUserEntity()
    {
        return $this->userEntity;
    }

    public function setUserHydrator(HydratorInterface $hydrator)
    {
        $this->userHydrator = $hydrator;
        return $this;
    }

    public function getUserHydrator()
    {
        return $this->userHydrator;
    }

    public function setJointPropertyValueEntity(JointPropertyValueInterface $jpv)
    {
        $this->jpvEntity = $jpv;
        return $this;
    }

    public function getJointPropertyValueEntity()
    {
        return $this->jpvEntity;
    }

    public function getJointPropertyValueHydrator()
    {
        return $this->jpvHydrator;
    }

    public function setJointPropertyValueHydrator(HydratorInterface $hydrator)
    {
        $this->jpvHydrator = $hydrator;
        return $this;
    }
}

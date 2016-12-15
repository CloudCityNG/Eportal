<?php
namespace EportalUser\Mapper;

use Zend\Stdlib\Hydrator\HydratorInterface;
use EportalUser\Model\EportalUserInterface;
use Property\Model\PropertyValueInterface;

/**
 *
 * @author imaleo
 *        
 */
class UserPropertyValueMapper extends EportalAbstractDbMapper implements UserPropertyValueMapperInterface
{
    protected $tableName = 'user_property_value';
    
    private $userTable = 'eportal_user';
    
    private $pvTable = 'property_value';
    
    private $ujpvTable = 'user_joint_property_value';
    
    private $userHydrator;
    
    private $pvHydrator;
    
    private $userEntity;
    
    private $pvEntity;

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getPropertyValues()
     *
     */
    public function getPropertyValues($user, $sessionTerm, $property = null)
    {
        $where = array(
            'user = ?' => $user,
            'joint_property_value = ?' => $sessionTerm,
        );
        if($property){
            $where['property = ?'] = $property;
        }
        $select = $this->getSelect()
        ->join($this->ujpvTable, $this->ujpvTable.'.id = '.$this->tableName.'.user_joint_property_value', array())
        ->join($this->pvTable, $this->pvTable.'.id = '.$this->tableName.'.property_value')
        ->where($where)
        ->order(array('property ASC', 'value ASC'))
        ->columns(array());
        /**
         * @todo throw Exception if either $pvEntity or $pvHydrator is Null
        */
        return $this->select($select, $this->pvEntity, $this->pvHydrator);
    }
    
    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::hasPropertyValue()
     *
     */
    public function hasPropertyValue($user, $propertyValue, $sessionTerm)
    {
        $select = $this->getSelect()
        ->join($this->ujpvTable, $this->tableName.'.user_joint_property_value = '.$this->ujpvTable.'.id', array())
        ->where(array(
            'user = ?' => $user,
            'property_value = ?' => $propertyValue,
            'joint_property_value = ?' => $sessionTerm
        ));
        return boolval($this->select($select));
    }  

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getUsers()
     *
     */
    public function getUsers($sessionTerm, $propertyValue, $role = null)
    {
        $select = $this->getSelect()
        ->join($this->ujpvTable, $this->ujpvTable.'.id = '.$this->tableName.'.user_joint_property_value', array())
        ->join($this->userTable, $this->ujpvTable.'.user = user_id');
    
        $where = array(
            'joint_property_value = ?' => $sessionTerm,
            'property_value = ?' => $propertyValue,
        );
    
        /**
         * @todo implement role
        */
        //         if($role){
        //             $where = array_merge($where, array('role = ?' => $role));
        //             $select->join('user_role', 'user_role.user = user_id');
        //         }
        $select->where($where)
        ->columns(array());
    
        return $this->select($select, $this->userEntity, $this->userHydrator);
    }
        
    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::setPropertyValueHydrator()
     *
     */
    public function setPropertyValueHydrator(HydratorInterface $hydrator)
    {
        $this->pvHydrator = $hydrator;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::setEportalUserEntity()
     *
     */
    public function setEportalUserEntity(EportalUserInterface $user)
    {
        $this->userEntity = $user;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getEportalUserEntity()
     *
     */
    public function getEportalUserEntity()
    {
        return $this->userEntity;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::setPropertyValueEntity()
     *
     */
    public function setPropertyValueEntity(PropertyValueInterface $propertyValue)
    {
        $this->pvEntity = $propertyValue;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getPropertyValueTable()
     *
     */
    public function getPropertyValueTable()
    {
        return $this->pvTable;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::setPropertyValueTable()
     *
     */
    public function setPropertyValueTable($pvTable)
    {
        $this->pvTable = $pvTable;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getPropertyValueEntity()
     *
     */
    public function getPropertyValueEntity()
    {
        return $this->pvEntity;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getEportalUserHydrator()
     *
     */
    public function getEportalUserHydrator()
    {
        return $this->userHydrator;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getEportalUserTable()
     *
     */
    public function getEportalUserTable()
    {
        return $this->userTable;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::setEportalUserTable()
     *
     */
    public function setEportalUserTable($userTable)
    {
        $this->userTable = $userTable;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::setEportalUserHydrator()
     *
     */
    public function setEportalUserHydrator(HydratorInterface $hydrator)
    {
        $this->userHydrator = $hydrator;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Mapper\UserPropertyValueMapperInterface::getPropertyValueHydrator()
     *
     */
    public function getPropertyValueHydrator()
    {
        return $this->pvHydrator;
    }
    
    public function setUserJointPropertyValueTable($ujpv){
        $this->ujpvTable = $ujpv;
        return $this;
    }
    
    public function getUserJointPropertyValueTable(){
        return $this->ujpvTable;
    }
}

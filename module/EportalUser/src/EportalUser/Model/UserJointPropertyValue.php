<?php
namespace EportalUser\Model;

/**
 *
 * @author imaleo
 *        
 */
class UserJointPropertyValue implements UserJointPropertyValueInterface
{
    protected $user;
    
    protected $jpv;
    
    protected $id;

    /**
     *
     * @see \EportalUser\Model\UserJointPropertyValueInterface::getUser()
     *
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     *
     * @see \EportalUser\Model\UserJointPropertyValueInterface::getJointPropertyValue()
     *
     */
    public function getJointPropertyValue()
    {
        return $this->jpv;
    }

    /**
     *
     * @see \EportalUser\Model\UserJointPropertyValueInterface::setUser()
     *
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Model\UserJointPropertyValueInterface::setJointPropertyValue()
     *
     */
    public function setJointPropertyValue($jpv)
    {
        $this->jpv = $jpv;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Model\UserJointPropertyValueInterface::setId()
     *
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Model\UserJointPropertyValueInterface::getId()
     *
     */
    public function getId()
    {
        return $this->id;
    }
}

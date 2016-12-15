<?php
namespace EportalUser\Model;

/**
 *
 * @author imaleo
 *        
 */
class UserPropertyValue implements UserPropertyValueInterface
{
    protected $id;
    
    protected $propertyValue;
    
    protected $ujpv;

    /**
     *
     * @see \EportalUser\Model\UserPropertyValueInterface::setPropertyValue()
     *
     */
    public function setPropertyValue($propertyValue)
    {
        $this->propertyValue = $propertyValue;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Model\UserPropertyValueInterface::getEportalJointPropertyValue()
     *
     */
    public function getEportalJointPropertyValue()
    {
        return $this->ujpv;
    }

    /**
     *
     * @see \EportalUser\Model\UserPropertyValueInterface::getPropertyValue()
     *
     */
    public function getPropertyValue()
    {
        return $this->propertyValue;
    }

    /**
     *
     * @see \EportalUser\Model\UserPropertyValueInterface::setEportalJointPropertyValue()
     *
     */
    public function setEportalJointPropertyValue($ujpv)
    {
        $this->ujpv = $ujpv;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Model\UserPropertyValueInterface::setId()
     *
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @see \EportalUser\Model\UserPropertyValueInterface::getId()
     *
     */
    public function getId()
    {
        return $this->id;
    }
}

?>
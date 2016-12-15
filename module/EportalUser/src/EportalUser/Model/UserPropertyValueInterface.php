<?php
namespace EportalUser\Model;

/**
 *
 * @author imaleo
 *        
 */
interface UserPropertyValueInterface
{

    public function getId();

    public function setId($id);

    public function setPropertyValue($propertyValue);

    public function getPropertyValue();

    public function getEportalJointPropertyValue();

    public function setEportalJointPropertyValue($ejpv);
}


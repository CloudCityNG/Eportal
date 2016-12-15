<?php
namespace EportalUser\Model;

/**
 *
 * @author imaleo
 *        
 */
interface UserJointPropertyValueInterface
{
    public function getId();

    public function setId($id);

    public function getUser();

    public function setUser($user);

    public function getJointPropertyValue();

    public function setJointPropertyValue($jpv);
}


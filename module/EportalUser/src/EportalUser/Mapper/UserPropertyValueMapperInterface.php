<?php
namespace EportalUser\Mapper;

/**
 *
 * @author imaleo
 *        
 */
interface UserPropertyValueMapperInterface
{
    public function getUsers($sessionTerm, $propertyValue, $role = null);
    
    public function getPropertyValues($user, $sessionTerm, $property = null);
    
    public function hasPropertyValue($user, $propertyValue, $sessionTerm);
}


<?php
namespace EportalUser\Service;

/**
 *
 * @author imaleo
 *        
 */
interface UserPropertyValueServiceInterface
{
    public function getUsers($sessionTerm, $propertyValue, $role = null);
    
    public function getPropertyValues($user, $sessionTerm, $property);
    
    public function hasPropertyValue($user, $propertyValue, $sessionTerm);
    
    public function getSubjects($user, $sessionTerm);
    
    public function getSection($user, $sessionTerm);
    
    public function getDepartment($user, $sessionTerm);
    
    public function getSchool($user, $sessionTerm);
    
    public function getClass($user, $sessionTerm);
}


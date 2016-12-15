<?php
namespace EportalUser\Service;

use EportalUser\Mapper\UserPropertyValueMapperInterface;
use Property\Mapper\PropertyMapperInterface;

/**
 *
 * @author imaleo
 *        
 */
class UserPropertyValueService implements UserPropertyValueServiceInterface
{

    /**
     *
     * @var \EportalUser\Mapper\UserPropertyValueMapperInterface
     */
    protected $mapper;

    /**
     *
     * @var \Property\Mapper\PropertyMapperInterface
     */
    protected $propertyMapper;

    public function __construct(UserPropertyValueMapperInterface $mapper, PropertyMapperInterface $propertyMapper)
    {
        $this->mapper = $mapper;
        $this->propertyMapper = $propertyMapper;
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::getClass()
     *
     */
    public function getClass($user, $sessionTerm)
    {
        return $this->getPropertyValues($user, $sessionTerm, 'class');
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::getSchool()
     *
     */
    public function getSchool($user, $sessionTerm)
    {
        return $this->getPropertyValues($user, $sessionTerm, 'school');
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::getSection()
     *
     */
    public function getSection($user, $sessionTerm)
    {
        return $this->getPropertyValues($user, $sessionTerm, 'section');
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::getSubjects()
     *
     */
    public function getSubjects($user, $sessionTerm)
    {
        return $this->getPropertyValues($user, $sessionTerm, 'subject');
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::getDepartment()
     *
     */
    public function getDepartment($user, $sessionTerm)
    {
        return $this->getPropertyValues($user, $sessionTerm, 'department');
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::getPropertyValues()
     *
     */
    public function getPropertyValues($user, $sessionTerm, $property = null)
    {
        if ($property) {
            $property = $this->propertyMapper->findByName(strtolower($property))->getId();
        }
        return $this->mapper->getPropertyValues($user, $sessionTerm, $property);
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::hasPropertyValue()
     *
     */
    public function hasPropertyValue($user, $propertyValue, $sessionTerm)
    {
        return $this->mapper->hasPropertyValue($user, $propertyValue, $sessionTerm);
    }

    /**
     *
     * @see \EportalUser\Service\UserPropertyValueInterface::getUsers()
     *
     */
    public function getUsers($sessionTerm, $propertyValue, $role = null)
    {
        return $this->mapper->getUsers($sessionTerm, $propertyValue);
    }
    
    public function setPropertyMapper(PropertyMapperInterface $propertyMapper)
    {
        $this->propertyMapper = $propertyMapper;
        return $this;
    }
    
    public function getPropertyMapper()
    {
        return $this->propertyMapper;
    }
    
    public function setUserPropertyValueMapper(UserPropertyValueMapperInterface $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
    
    public function getUserPropertyValueMapper()
    {
        return $this->mapper;
    }
    
}

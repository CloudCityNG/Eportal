<?php

namespace EportalUser\Mapper;

use EportalUser\Model\EportalUserInterface;
use Property\Model\JointPropertyValueInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;


/**
 *
 * @author imaleo
 *        
 */
interface UserJointPropertyValueMapperInterface
{
    public function findById($id);
    
    public function getUsers($jointPropertyValue);
    
    public function getJointPropertyValues($user);
    
    public function exist($user, $jointPropertyValue);
}

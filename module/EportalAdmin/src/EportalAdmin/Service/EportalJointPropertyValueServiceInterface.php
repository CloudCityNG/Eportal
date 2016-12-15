<?php
namespace EportalAdmin\Service;

use Property\Model\PropertyValueInterface;
/**
 *
 * @author imaleo
 *        
 */
interface EportalJointPropertyValueServiceInterface
{
    public function getSchool(PropertyValueInterface $propertyValue);
    
    public function getDepartment(PropertyValueInterface $propertyValue);
    
    public function getClass(PropertyValueInterface $propertyValue);
    
    public function getSubject(PropertyValueInterface $propertyValue);
    
    public function getSection(PropertyValueInterface $propertyValue);
    
    public function getSession(PropertyValueInterface $term);
    
    public function getTerm(PropertyValueInterface $session);
}

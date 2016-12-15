<?php
namespace EportalAdmin\Service;

use Property\Model\PropertyValueInterface;
use Property\Service\JointPropertyValueServiceInterface;
use Property\Service\PropertyServiceInterface;


/**
 *
 * @author imaleo
 *        
 */
class EportalJointPropertyValueService implements EportalJointPropertyValueServiceInterface
{
    protected $jpvService;
    protected $propertyService;

    public function __construct(JointPropertyValueServiceInterface $jpvService, PropertyServiceInterface $propertyService)
    {
        $this->jpvService = $jpvService;
        $this->propertyService = $propertyService;
    }
    
    /**
     *
     * @see \Eportal\Service\EportalJointPropertyValueServiceInterface::getClass()
     *
     */
    public function getClass(PropertyValueInterface $propertyValue)
    {
        $classProperty = $this->propertyService->findByName('class');
        if($propertyValue->getProperty()->getName() == 'school') {
            return $this->jpvService->findSecondPropertyValue($classProperty, $propertyValue);
        }
        return $this->jpvService->findFirstPropertyValue($classProperty, $propertyValue);
    }

    /**
     *
     * @see \Eportal\Service\EportalJointPropertyValueServiceInterface::getSchool()
     *
     */
    public function getSchool(PropertyValueInterface $propertyValue)
    {
        $schoolProperty = $this->propertyService->findByName('school');
        return $this->jpvService->findFirstPropertyValue($schoolProperty, $propertyValue);
    }

    /**
     *
     * @see \Eportal\Service\EportalJointPropertyValueServiceInterface::getTerm()
     *
     */
    public function getTerm(PropertyValueInterface $session)
    {
        $termProperty = $this->propertyService->findByName('term');
        return $this->jpvService->findSecondPropertyValue($termProperty, $session);
    }

    /**
     *
     * @see \Eportal\Service\EportalJointPropertyValueServiceInterface::getSection()
     *
     */
    public function getSection(PropertyValueInterface $propertyValue)
    {
        $sectionProperty = $this->propertyService->findByName('section');
        return $this->jpvService->findSecondPropertyValue($sectionProperty, $propertyValue);
    }

    /**
     *
     * @see \Eportal\Service\EportalJointPropertyValueServiceInterface::getSubject()
     *
     */
    public function getSubject(PropertyValueInterface $propertyValue)
    {
        $subjectProperty = $this->propertyService->findByName('subject');
        return $this->jpvService->findSecondPropertyValue($subjectProperty, $propertyValue);
    }

    /**
     *
     * @see \Eportal\Service\EportalJointPropertyValueServiceInterface::getDepartment()
     *
     */
    public function getDepartment(PropertyValueInterface $propertyValue)
    {
        $deptProperty = $this->propertyService->findByName('department');
        if($propertyValue->getProperty()->getName() == 'subject'){
            return $this->jpvService->findFirstPropertyValue($deptProperty, $propertyValue);
        }
        return $this->jpvService->findSecondPropertyValue($deptProperty, $propertyValue);
    }

    /**
     *
     * @see \Eportal\Service\EportalJointPropertyValueServiceInterface::getSession()
     *
     */
    public function getSession(PropertyValueInterface $term)
    {
        $sessionProperty = $this->propertyService->findByName('session');
        return $this->jpvService->findFirstPropertyValue($sessionProperty, $term);
    }
}

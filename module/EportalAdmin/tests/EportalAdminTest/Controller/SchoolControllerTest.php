<?php

namespace EportalAdminTest\Controller;

use Property\Model\Property;
use Property\Model\PropertyValue;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Description of SchoolControllerTest
 *
 * @author imaleo
 */
class SchoolControllerTest extends AbstractHttpControllerTestCase {
    protected $traceError = true;
    protected $propertyValueService;
    protected $propertyService;
    protected $schoolForm;
    protected $jpvService;
    
    public function setUp() {
        $this->setApplicationConfig(include 'C:/xampp/htdocs/Eportal/config/application.config.php');
        parent::setUp();
        
        $this->propertyValueService = $this->getMockBuilder('Property\Service\PropertyValueService')
                ->disableOriginalConstructor()
                ->getMock();
        $this->propertyService = $this->getMockBuilder('Property\Service\PropertyService')
                ->disableOriginalConstructor()
                ->getMock();
        $this->schoolForm = $this->getMockBuilder('Property\Form\PropertyValueForm')
                ->disableOriginalConstructor()
                ->getMock();
        $this->jpvService = $this->getMockBuilder('EportalAdmin\Service\EportalJointPropertyValueService')
                ->disableOriginalConstructor()
                ->getMock();
        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(TRUE);
        $serviceManager->setService('Property\Service\Property', $this->propertyService);
        $serviceManager->setService('Property\Service\PropertyValue', $this->propertyValueService);
        $serviceManager->setService('EportalAdmin\Form\SchoolForm', $this->schoolForm);
        $serviceManager->setService('EportalAdmin\Service\EportalJointPropertyValue', $this->jpvService);
    }

    public function testIndexActionCanBeAccessed() {
        $property = new Property(1, 'school');
        $propertyValue = array('ss1', 'ss2', 'ss3');
        $this->propertyService->expects($this->any())
                ->method('findByName')
                ->will($this->returnValue($property));

        $this->propertyValueService->expects($this->any())
                ->method('findByProperty')
                ->with($property)
                ->will($this->returnValue($propertyValue));
        $this->dispatch('/admin/school');
        $this->assertResponseStatusCode(200);
        $this->assertControllerClass('SchoolController');
        $this->assertActionName('index');
    }

    public function testIndexActionCanBeAccessedWithQueryParams() {
        $this->jpvService->expects($this->once())
                ->method('getSubject')
                ->will($this->returnValue(array()));
        $this->jpvService->expects($this->once())
                ->method('getSection')
                ->will($this->returnValue(array()));
        $this->jpvService->expects($this->once())
                ->method('getClass')
                ->will($this->returnValue(array()));
        $this->propertyValueService->expects($this->once())
                ->method('findById')
                ->will($this->returnValue(new PropertyValue()));
        $this->dispatch('/admin/school', 'GET', array('pv_id'=>2));
        $this->assertResponseStatusCode(200);
    }
    public function testAddActionWithGetMethod() {
        $this->dispatch('/admin/school/add');
        $this->assertControllerClass('SchoolController');
        $this->assertActionName('add');
        $this->assertResponseStatusCode(200);
    }
    
    public function testAddActionWithPostMethod() {
        $property = new Property(1, 'school');
        $propertyValue = new PropertyValue(1, 'property_value', $property);
        $this->propertyService->expects($this->any())
                ->method('findByName')
                ->will($this->returnValue($property));
        
        $this->schoolForm->expects($this->once())
                ->method('setData')
                ->will($this->returnSelf());
        $this->schoolForm->expects($this->once())
                ->method('isValid')
                ->will($this->returnValue(true));
        $this->schoolForm->expects($this->once())
                ->method('getData')
                ->will($this->returnValue($propertyValue));
        $this->propertyValueService->expects($this->once())
                ->method('insert')
                ->will($this->returnValue(true));
        $this->dispatch('/admin/school/add', 'POST', array());
        $this->assertRedirectTo('admin/school');
        $this->assertResponseStatusCode(302);
    }
    
    public function testAddActionForInvalidFormWithPostMethod() {
        $property = new Property(1, 'school');
        $this->propertyService->expects($this->any())
                ->method('findByName')
                ->will($this->returnValue($property));
        
        $this->schoolForm->expects($this->once())
                ->method('setData')
                ->will($this->returnSelf());
        $this->schoolForm->expects($this->once())
                ->method('isValid')
                ->will($this->returnValue(false));
        $this->dispatch('/admin/school/add', 'POST', array());
        $this->assertResponseStatusCode(200);
    }
}

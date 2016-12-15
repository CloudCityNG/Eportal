<?php


namespace EportalAdminTest\Service;

use EportalAdmin\Service\EportalJointPropertyValueService;

/**
 * Description of EportalJointPropertyValueServiceTest
 *
 * @author imaleo
 */
class EportalJointPropertyValueServiceTest extends \PHPUnit_Framework_TestCase {
    protected $ejpvService;
    protected $jpvService;
    protected $propertyService;
    
    public function setUp() {
        parent::setUp();
        $this->jpvService = $this->getMockBuilder('Property\Service\JointPropertyValueService')
                ->disableOriginalConstructor()
                ->getMock();
        $this->propertyService = $this->getMockBuilder('Property\Service\PropertyService')
                ->disableOriginalConstructor()
                ->getMock();
        $this->ejpvService = new EportalJointPropertyValueService($this->jpvService, $this->propertyService);
    }
    
    public function testGetSchool(){
        
    }
}

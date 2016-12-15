<?php

namespace PropertyTest\Service;

use Property\Model\Property;
use Property\Model\PropertyValue;
use Property\Service\JointPropertyValueService;

/**
 * Description of JointPropertyValueMapperTest
 *
 * @author imaleo
 */
class JointPropertyValueServiceTest extends \PHPUnit_Framework_TestCase{
    private $mapper;
    private $service;
    
    public function setUp() {
        $this->mapper = $this->getMockBuilder('Property\Mapper\JointPropertyValueMapper')
                ->disableOriginalConstructor()
                ->getMock();
        $this->service = new JointPropertyValueService($this->mapper);
    }
    
    public function testFindByFirstPropertyValue() {
        $returnValue = array();
        $propertyValue = new PropertyValue();
        $this->mapper->expects($this->once())
                ->method('findByFirstPropertyValue')
                ->will($this->returnValue($returnValue));
        $result = $this->service->findByFirstPropertyValue($propertyValue);
        $this->assertEquals($returnValue, $result);
    }
    
    public function testFindFirstPropertyValue() {
        $returnValue = array();
        $propertyValue = new PropertyValue();
        $this->mapper->expects($this->once())
                ->method('findFirstPropertyValue')
                ->will($this->returnValue($returnValue));
        $result = $this->service->findFirstPropertyValue(new Property(), $propertyValue);
        $this->assertEquals($returnValue, $result);
    }
    
    public function testFindSecondPropertyValue() {
        $returnValue = array();
        $propertyValue = new PropertyValue();
        $this->mapper->expects($this->once())
                ->method('findSecondPropertyValue')
                ->will($this->returnValue($returnValue));
        $result = $this->service->findSecondPropertyValue(new Property(), $propertyValue);
        $this->assertEquals($returnValue, $result);
    }
    
    public function testFindJointPropertyValue() {
        $returnValue = array();
        $propertyValue = new PropertyValue();
        $this->mapper->expects($this->once())
                ->method('findJointPropertyValue')
                ->will($this->returnValue($returnValue));
        $result = $this->service->findJointPropertyValue($propertyValue, $propertyValue);
        $this->assertEquals($returnValue, $result);
    }
    
    public function testFindById() {
        $returnValue = new \Property\Model\JointPropertyValue();
        $this->mapper->expects($this->once())
                ->method('findById')
                ->will($this->returnValue($returnValue));
        $result = $this->service->findById(1);
        $this->assertEquals($returnValue, $result);
    }
}

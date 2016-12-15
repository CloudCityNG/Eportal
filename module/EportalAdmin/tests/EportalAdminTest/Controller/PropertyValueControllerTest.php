<?php

namespace EportalAdminTest\Controller;

use EportalAdmin\Controller\PropertyValueController;
use Property\Model\Property;
use Property\Model\PropertyValue;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Description of PropertyValueControllerTest
 *
 * @author imaleo
 */
class PropertyValueControllerTest extends AbstractHttpControllerTestCase{
    /**
     *
     * @var PropertyValueController 
     */
    private $controller;
    
    /**
     *
     * @var Request
     */
    private $request;
    
    /**
     *
     * @var Response 
     */
    private $response;
    
    /**
     *
     * @var RouteMatch
     */
    private $routeMatch;
    
    /**
     *
     * @var MvcEvent 
     */
    private $event;

    private $form;
    
    private $propertyValueService;
    
    public function setUp(){
        parent::setUp();
        $this->controller = new PropertyValueController();
        $this->request = new Request();
        $this->response = new Response();
        $this->routeMatch = new RouteMatch(array('controller' => 'property-value'));
        $this->event = new MvcEvent();
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        
        $this->form = $this->getMockBuilder('Property\Form\PropertyValueForm')
                ->disableOriginalConstructor()
//                ->setMethods(array('isValid', 'bind', 'setData'))
                ->getMock();
        $this->propertyValueService = $this->getMockBuilder('Property\Service\PropertyValueServiceInterface')
                ->disableOriginalConstructor()
//                ->setMethods(array('update', 'findByid'))
                ->getMock();
        $this->controller->setPropertyValueForm($this->form)
                ->setPropertyValueService($this->propertyValueService);
    }
    
    public function testEditActionOnGetRequest(){
        $id = 5;
        $propertyValue = new PropertyValue($id, 'value', new Property(3, 'property'));
        $this->routeMatch->setParam('action', 'edit');
        $this->routeMatch->setParam('id', $id);
        $this->request->setMethod('get');
        
        $this->propertyValueService->expects($this->once())
                ->method('findById')
                ->will($this->returnValue($propertyValue));
        $this->form->expects($this->once())
                ->method('bind');
        $this->form->setName('test_form');
        
        $response = $this->controller->dispatch($this->request);
//        $viewModelVariables = $response->getVariables();
        $formReturned = $response['form'];
        $this->assertEquals($this->form->getName(), $formReturned->getName());
        $this->assertEquals($response['property'], $propertyValue->getProperty()->getName());
    }
    
    public function testEditActionOnPostRequestWithValidData() {
        $id = 5;
        $propertyValue = new PropertyValue($id, 'value', new Property(3, 'property'));
        $this->routeMatch->setParam('action', 'edit');
        $this->routeMatch->setParam('id', $id);
        $this->request->setMethod('post');
        
        $this->propertyValueService->expects($this->once())
                ->method('findById')
                ->will($this->returnValue($propertyValue));
        $this->propertyValueService->expects($this->once())
                ->method('update');
        
        $this->form->setName('test_form');
        $this->form->expects($this->once())
                ->method('bind');
        $this->form->expects($this->once())
                ->method('isValid')
                ->will($this->returnValue(true));
        
        $response = $this->controller->dispatch($this->request);
        $formReturned = $response['form'];
        $this->assertEquals($this->form->getName(), $formReturned->getName());
        $this->assertEquals($response['property'], $propertyValue->getProperty()->getName());
        $this->assertTrue($response['success']);
    }
    
    public function testEditActionOnPostRequestWithInValidData() {
        $id = 5;
        $propertyValue = new PropertyValue($id, 'value', new Property(3, 'property'));
        $this->routeMatch->setParam('action', 'edit');
        $this->routeMatch->setParam('id', $id);
        $this->request->setMethod('post');
        
        $this->propertyValueService->expects($this->once())
                ->method('findById')
                ->will($this->returnValue($propertyValue));
        
        $this->form->setName('test_form');
        $this->form->expects($this->once())
                ->method('bind');
        $this->form->expects($this->once())
                ->method('isValid')
                ->will($this->returnValue(false));
        
        $response = $this->controller->dispatch($this->request);
        $formReturned = $response['form'];
        $this->assertEquals($this->form->getName(), $formReturned->getName());
        $this->assertEquals($response['property'], $propertyValue->getProperty()->getName());
        $this->assertFalse($response['success']);
    }
}

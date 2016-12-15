<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/EportalAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace EportalAdmin;

use EportalAdmin\Form\Property\DepartmentFieldset;
use EportalAdmin\Form\Property\PropertyBaseFieldset;
use EportalAdmin\Form\Property\PropertyForm;
use EportalAdmin\Form\Property\SectionFieldset;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface, ServiceProviderInterface {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/', __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e) {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getServiceConfig() {
        return array(
            'invokables' => array(
                'EportalAdmin\Form\SectionForm' => function() {
                    $fieldset = new SectionFieldset();
                    $form = new PropertyForm('section-form', $fieldset);
                    return $form;
                },
                'EportalAdmin\Form\DepartmentForm' => function() {
                    $fieldset = new DepartmentFieldset();
                    $form = new PropertyForm('department-form', $fieldset);
                    return $form;
                },
                'EportalAdmin\Form\SchoolForm' => function() {
                    $form = new \Property\Form\PropertyValueForm('school');
                    return $form;
                },
                'EportalAdmin\Form\SessionForm' => function() {
                    $fieldset = new PropertyBaseFieldset('session');
                    $form = new PropertyForm('session-form', $fieldset);
                    return $form;
                },
                'EportalAdmin\Form\TermForm' => function() {
                    $fieldset = new PropertyBaseFieldset('term');
                    $form = new PropertyForm('term-form', $fieldset);
                    return $form;
                },
            ),
            'factories' => array(
                'EportalAdmin\Service\EportalJointPropertyValue' => \EportalAdmin\Factory\Service\EportalJointPropertyValueServiceFactory::class,
            )
        );
    }

}

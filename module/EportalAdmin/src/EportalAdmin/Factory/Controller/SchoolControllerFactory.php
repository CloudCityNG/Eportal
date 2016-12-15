<?php

namespace EportalAdmin\Factory\Controller;

use EportalAdmin\Controller\SchoolController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of SchoolControllerFactory
 *
 * @author imaleo
 */
class SchoolControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $controller = new SchoolController();
        $sl = $serviceLocator->getServiceLocator();
        $controller->setPropertyService($sl->get('Property\Service\Property'))
                ->setPropertyValueService($sl->get('Property\Service\PropertyValue'))
                ->setSchoolForm($sl->get('EportalAdmin\Form\SchoolForm'))
                ->setEportalJointPropertyValueService($sl->get('EportalAdmin\Service\EportalJointPropertyValue'));
        return $controller;
    }

}

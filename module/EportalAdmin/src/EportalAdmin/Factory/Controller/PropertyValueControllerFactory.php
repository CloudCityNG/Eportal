<?php


namespace EportalAdmin\Factory\Controller;

use EportalAdmin\Controller\PropertyValueController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of PropertyValueControllerFactory
 *
 * @author imaleo
 */
class PropertyValueControllerFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $form = $serviceLocator->get('Property\Form\PropertyValue');
        $pvService = $serviceLocator->get('Property\Service\PropertyValue');
        $pvController = new PropertyValueController();
        $pvController->setPropertyValueService($pvService)
                ->setPropertyValueForm($form);
        return $pvController;
    }

}

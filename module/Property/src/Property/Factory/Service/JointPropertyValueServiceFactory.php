<?php

namespace Property\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Property\Service\JointPropertyValueService;

/**
 *
 * @author imaleo
 *        
 */
class JointPropertyValueServiceFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see FactoryInterface::createService()
     *
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new JointPropertyValueService($serviceLocator->get('Property\Service\PropertyValue'));
    }
}

?>
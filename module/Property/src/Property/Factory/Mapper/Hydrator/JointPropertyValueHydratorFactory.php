<?php
namespace Property\Factory\Mapper\Hydrator;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Property\Mapper\Hydrator\JointPropertyValueHydrator;

/**
 *
 * @author imaleo
 *        
 */
class JointPropertyValueHydratorFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     *
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new JointPropertyValueHydrator($serviceLocator->get('Property\Service\PropertyValue'));
    }
}

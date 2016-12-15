<?php
namespace Property\Factory\Mapper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Property\Model\JointPropertyValue;
use Property\Mapper\JointPropertyValueMapper;

/**
 *
 * @author imaleo
 *        
 */
class JointPropertyValueMapperFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     *
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new JointPropertyValueMapper();
        $mapper->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'))
        ->setHydrator($serviceLocator->get('Property\Hydrator\JointPropertyValue'))
        ->setEntityPrototype(new JointPropertyValue());
        return $mapper;
    }
}

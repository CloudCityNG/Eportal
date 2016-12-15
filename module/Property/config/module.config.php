<?php
return array(
    'service_manager' => [
        'factories' => [
            //mapper
            'Property\Mapper\Property' => \Property\Factory\Mapper\PropertyMapperFactory::class,
            'Property\Mapper\PropertyValue' => \Property\Factory\Mapper\PropertyValueMapperFactory::class,
            'Property\Mapper\JointPropertyValue' => \Property\Factory\Mapper\JointPropertyValueMapperFactory::class,
            
            //service
            'Property\Service\Property' => \Property\Factory\Service\PropertyServiceFactory::class,
            'Property\Service\PropertyValue' => \Property\Factory\Service\PropertyValueServiceFactory::class,
            'Property\Service\JointPropertyValueService' => \Property\Factory\Service\JointPropertyValueServiceFactory::class,
            
            //hydrator
            'Property\Hydrator\PropertyValue' => \Property\Factory\Mapper\Hydrator\PropertyValueHydratorFactory::class,
            'Property\Hydrator\JointPropertyValue' => \Property\Factory\Mapper\Hydrator\JointPropertyValueHydratorFactory::class
        ],
        
        'invokables' => [
            'Property\Hydrator\Property' => \Zend\Stdlib\Hydrator\ClassMethods::class
        ]
    ]
);

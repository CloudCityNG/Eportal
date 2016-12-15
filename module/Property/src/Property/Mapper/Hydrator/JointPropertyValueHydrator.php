<?php
namespace Property\Mapper\Hydrator;

use Property\Service\PropertyValueServiceInterface;
use Property\Model\JointPropertyValueInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 *
 * @author imaleo
 *        
 */
class JointPropertyValueHydrator extends ClassMethods
{

    private $propertyValueService;

    /**
     *
     * @param bool|array $underscoreSeparatedKeys            
     *
     */
    public function __construct(PropertyValueServiceInterface $propertyValueService, $underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);
        $this->propertyValueService = $propertyValueService;
    }

    public function hydrate(array $data, $object)
    {
        if (! $object instanceof JointPropertyValueInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance Property\Model\JoinedPropertyValueInterface');
        }
        $data['first_property_value'] = $this->propertyValueService->findById($data['first_property_value']);
        $data['second_property_value'] = $this->propertyValueService->findById($data['second_property_value']);
        return parent::hydrate($data, $object);
    }

    public function extract($object)
    {
        if (! $object instanceof JointPropertyValueInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance Property\Model\JoinedPropertyValueInterface');
        }
        $data = parent::extract($object);
        $data['first_property_value'] = $object->getFirstPropertyValue()->getId();
        $data['second_property_value'] = $object->getSecondPropertyValue()->getId();
        return $data;
    }
    
    public function getPropertyValueService(){
        return $this->propertyValueService;
    }
    
    public function setPropertyValueService(PropertyValueServiceInterface $propertyValueService)
    {
        $this->propertyValueService = $propertyValueService;
        return $this;
    }
}

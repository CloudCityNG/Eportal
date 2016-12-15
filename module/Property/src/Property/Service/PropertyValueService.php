<?php


namespace Property\Service;

use Property\Mapper\PropertyValueMapperInterface;
use Property\Model\Property;
use Property\Model\PropertyInterface;
use Property\Model\PropertyValue;
use Property\Model\PropertyValueInterface;

/**
 * Description of PropertyValueService
 *
 * @author imaleo
 */
class PropertyValueService implements PropertyValueServiceInterface{
    /**
     *
     * @var PropertyValueMapperInterface
     */
    private $mapper;
    
    public function __construct(PropertyValueMapperInterface $mapper) {
        $this->mapper = $mapper;
    }

    public function getEntity($id = null, $value = null, PropertyInterface $property = null) {
        return new PropertyValue($id, $value, $property);
    }
    public function delete(PropertyValueInterface $propertyValue) {
        return $this->mapper->delete(array('id = ?' => $propertyValue->getId()));
    }

    public function findAll() {
        return $this->mapper->findAll();
    }

    public function findById($id) {
        return $this->mapper->findById($id);
    }

    public function findByProperty(Property $property) {
        return $this->mapper->findByProperty($property->getId());
    }

    public function insert(PropertyValueInterface $propertyValue) {
        $this->mapper->insert($propertyValue);
        return $propertyValue;
    }

    public function update(PropertyValueInterface $propertyValue, $where = null) {
        $this->mapper->update($propertyValue, $where);
        return $propertyValue;
    }
    
    /**
     * 
     * @param PropertyValueMapperInterface $mapper
     * @return PropertyValueService
     */
    public function setPropertyValueMapper(PropertyValueMapperInterface $mapper) {
        $this->mapper = $mapper;
        return $this;
    }
    
    /**
     * 
     * @return PropertyValueMapperInterface
     */
    public function getPropertyValueMapper(){
        return $this->mapper;
    }
}

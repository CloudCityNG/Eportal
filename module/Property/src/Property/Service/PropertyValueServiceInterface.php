<?php
namespace Property\Service;

use Property\Model\Property;
use Property\Model\PropertyInterface;
use Property\Model\PropertyValueInterface;

/**
 *
 * @author imaleo
 *        
 */
interface PropertyValueServiceInterface
{
    public function findAll();
    public function findById($id);
    public function findByProperty(Property $property);
    /**
     * 
     * @param int $id
     * @param string $value
     * @param PropertyInterface $property
     * @return PropertyValueInterface 
     */
    public function getEntity($id = null, $value = null, PropertyInterface $property = null);
    public function insert(PropertyValueInterface $propertyValue);
    public function update(PropertyValueInterface $propertyValue, $where = null);
    public function delete(PropertyValueInterface $propertyValue);
}

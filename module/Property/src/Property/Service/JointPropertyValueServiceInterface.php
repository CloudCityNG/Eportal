<?php


namespace Property\Service;

use Property\Model\JointPropertyValueInterface;
use Property\Model\PropertyInterface;
use Property\Model\PropertyValueInterface;

/**
 *
 * @author imaleo
 */
interface JointPropertyValueServiceInterface {
    
    public function findAll();
    public function findById($id);
    public function findByFirstPropertyValue(PropertyValueInterface $firstPropertyValue);
    
    /**
     * 
     * @param PropertyInterface $firstProperty
     * @param PropertyValueInterface $secondPropertyValue
     */
    public function findFirstPropertyValue(PropertyInterface $firstProperty, PropertyValueInterface $secondPropertyValue);
    
    /**
     * 
     * @param PropertyInterface $secondProperty
     * @param PropertyValueInterface $firstPropertyValue
     */
    public function findSecondPropertyValue(PropertyInterface $secondProperty, PropertyValueInterface $firstPropertyValue);
    
    /**
     * 
     * @param PropertyValueInterface $firstPropertyValue
     * @param PropertyValueInterface $secondPropertyValue
     */
    public function findJointPropertyValue(PropertyValueInterface $firstPropertyValue, PropertyValueInterface $secondPropertyValue);
    
    /**
     * 
     * @param JointPropertyValueInterface $jpv
     */
    public function insert(JointPropertyValueInterface $jpv);
    public function update(JointPropertyValueInterface $jpv, $where = null);
    public function delete(JointPropertyValueInterface $jpv);
}

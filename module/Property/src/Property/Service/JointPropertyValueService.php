<?php
namespace Property\Service;

use Property\Mapper\JointPropertyValueMapper;
use Property\Model\JointPropertyValueInterface;
use Property\Model\PropertyInterface;
use Property\Model\PropertyValueInterface;
/**
 *
 * @author imaleo
 *        
 */
class JointPropertyValueService implements JointPropertyValueServiceInterface
{

    protected $mapper;
    /**
     */
    public function __construct(JointPropertyValueMapper $mapper)
    {
        $this->mapper = $mapper;
    }
    

    public function delete(JointPropertyValueInterface $jpv) {
        return $this->mapper->delete(array('id' => $jpv->getId()));
    }

    public function findAll() {
        return $this->mapper->findAll();
    }

    public function findByFirstPropertyValue(PropertyValueInterface $firstPropertyValue) {
        return $this->mapper->findByFirstPropertyValue($firstPropertyValue->getId());
    }

    public function findById($id) {
        return $this->mapper->findById($id);
    }

    public function findJointPropertyValue(PropertyValueInterface $firstPropertyValue, PropertyValueInterface $secondPropertyValue) {
        return $this->mapper->findJointPropertyValue($firstPropertyValue->getId(), $secondPropertyValue->getId());
    }
    
    public function insert(JointPropertyValueInterface $jpv) {
        return $this->mapper->insert($jpv);
    }

    public function update(JointPropertyValueInterface $jpv, $where = null) {
        return $this->mapper->update($jpv, $where);
    }

    public function setJointPropertyValueMapper(JointPropertyValueMapper $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
    
    public function getJointPropertyValueMapper(){
        return $this->mapper;
    }

    public function findFirstPropertyValue(PropertyInterface $firstProperty, PropertyValueInterface $secondPropertyValue) {
        return $this->mapper->findFirstPropertyValue($firstProperty->getId(), $secondPropertyValue->getId());
    }

    public function findSecondPropertyValue(PropertyInterface $secondProperty, PropertyValueInterface $firstPropertyValue) {
        return $this->mapper->findSecondPropertyValue($secondProperty->getId(), $firstPropertyValue->getId());
    }

}


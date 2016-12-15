<?php

namespace Property\Mapper;

use Property\Model\PropertyValueInterface;
use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Where;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 *
 * @author imaleo
 *        
 */
class JointPropertyValueMapper extends AbstractPropertyDbMapper {

    protected $tableName = 'joint_property_value';
    protected $pvTable = 'property_value';
    protected $pvHydrator;
    protected $pvEntity;

    public function findAll() {
        return $this->select($this->getSelect());
    }

    public function findById($id) {
        $select = $this->getSelect()->where(array(
            'id = ?' => $id
        ));
        return $this->select($select)->current();
    }

    public function findByFirstPropertyValue($propertyValue) {
        $select = $this->getSelect()->where(array(
            'first_property_value = ?' => $propertyValue
        ));
        return $this->select($select);
    }

    public function findJointPropertyValue($firstPropertyValue, $secondPropertyValue) {
        $select = $this->getSelect()->where(array(
            'first_property_value = ?' => $firstPropertyValue,
            'second_property_value = ?' => $secondPropertyValue
        ));
        return $this->select($select)->current();
    }

    public function findFirstPropertyValue($firstProperty, $secondPropertyValue) {
        /*
         * select property_value.value from joint_property_value
         * join property_value on property_value.id = joint_property_value.first_property_value
         * where joint_property_value.second_property_value = $secondPropertyValue
         * and joint_property_value.first in
         * (select property_value.id from property_value
         * where property = $firstProperty)
         */
        $inSelect = $this->getSelect($this->pvTable)
                ->where('property = ' . $firstProperty)
                ->columns(array('id'));

        $select = $this->getSelect()
                ->join($this->pvTable, $this->tableName . '.first_property_value = ' . $this->pvTable . '.id')
                ->where(array(
                    $this->tableName . '.second_property_value = ' . $secondPropertyValue,
                    new Expression($this->tableName . '.first_property_value IN (?)', array($inSelect))
                ))
                ->columns(array());
        return $this->select($select, $this->pvEntity, $this->pvHydrator);
    }

    public function findSecondPropertyValue($secondProperty, $firstPropertyValue) {
        /*
         * select property_value.value from joint_property_value
         * join property_value on property_value.id = joint_property_value.first
         * where joint_property_value.second = $secondPropertyValue
         * and joint_property_value.first in
         * (select property_value.id from property_value
         * join property on property.id = property_value.property
         * where property.name = $firstProperty)
         */
        $inSelect = $this->getSelect($this->pvTable)
                ->where('property = ' . $secondProperty)
                ->columns(array('id'));

        $select = $this->getSelect()
                ->join($this->pvTable, $this->tableName . '.second_property_value = ' . $this->pvTable . '.id')
                ->where(array(
                    $this->tableName . '.first_property_value = ' . $firstPropertyValue,
                    new Expression($this->tableName . '.second_property_value IN (?)', array($inSelect))
                ))
                ->columns(array());
        return $this->select($select, $this->pvEntity, $this->pvHydrator);
    }

    public function hasJointPropertyValue($pv_1, $pv_2) {
        $ex_1 = new Expression("(first_property_value = ? AND second_property_value = ?)", array($pv_1, $pv_2));
        $ex_2 = new Expression("(first_property_value = ? AND second_property_value = ?)", array($pv_2, $pv_1));
        $where = new Where();
        $where->addPredicate($ex_1)->orPredicate($ex_2);
        $select = $this->getSelect()
                ->where($where)
                ->columns(array('id'));
//        echo PHP_EOL . PHP_EOL . $this->getSlaveSql()->getSqlStringForSqlObject($select) . PHP_EOL . PHP_EOL;
        $result = $this->select($select);
        return boolval($result->count());
    }

    public function getPropertyValueTable() {
        return $this->pvTable;
    }

    public function getPropertyValueHydrator() {
        return $this->pvHydrator;
    }

    public function getPropertyValueEntity() {
        return $this->pvEntity;
    }

    public function setPropertyValueTable($pvTable) {
        $this->pvTable = $pvTable;
        return $this;
    }

    public function setPropertyValueHydrator(HydratorInterface $pvHydrator) {
        $this->pvHydrator = $pvHydrator;
        return $this;
    }

    public function setPropertyValueEntity(PropertyValueInterface $pvEntity) {
        $this->pvEntity = $pvEntity;
        return $this;
    }

}

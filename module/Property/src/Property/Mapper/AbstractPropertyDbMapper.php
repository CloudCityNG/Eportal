<?php
namespace Property\Mapper;

use ZfcBase\Mapper\AbstractDbMapper;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 *
 * @author imaleo
 *        
 */
abstract class AbstractPropertyDbMapper extends AbstractDbMapper
{
    public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setId($result->getGeneratedValue());
        return $result;
    }
    
    public function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        if(!$where){
            $where = array('id = ?' => $entity->getId());
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
    
    public function delete($where = null, $tableName = null)
    {
        return parent::delete($where, $tableName);
    }
    
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }
}

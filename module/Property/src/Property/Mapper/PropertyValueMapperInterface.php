<?php


namespace Property\Mapper;

/**
 * Description of PropertyValueMapperInterface
 *
 * @author imaleo
 */
interface PropertyValueMapperInterface {
    public function findAll();
    
    public function findbyId($id);
    
    public function findByProperty($property);
    
    public function insert($entity);
    
    public function update($entity, $where);
    
    public function delete($where);
}

<?php
namespace Result\Mapper;

/**
 *
 * @author imaleo
 *        
 */
interface GradeMapperInterface
{
    public function insert($entity);
    
    public function update($entity, $where = null);
    
    public function delete($where = null);
    
    public function getGrade($grade);
}


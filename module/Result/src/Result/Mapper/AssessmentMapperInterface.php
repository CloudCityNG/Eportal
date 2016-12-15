<?php
namespace Result\Mapper;

/**
 *
 * @author imaleo
 *        
 */
interface AssessmentMapperInterface
{
    public function findById($assessment_id);
        
    public function insert($entity);
    
    public function update($entity, $where);
    
    public function delete($where);
    


//    private function findBySession($session_id);
//    
//    private function findByTerm($term_id);
}


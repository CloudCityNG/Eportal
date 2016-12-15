<?php
namespace Result\Mapper;

/**
 *
 * @author imaleo
 *        
 */
interface ResultScoreMapperInterface
{
    /**
     * 
     * @param int $result_id
     */
    public function findByResult($result_id);
    
    /**
     * 
     * @param int $assessment_id
     */
    public function findByAssessment($assessment_id);
    
    public function getResultScore($result_id, $assessment_id);
    
    public function insert($entity);
    
    public function update($entity, $where);
    
    public function delete($where);
}

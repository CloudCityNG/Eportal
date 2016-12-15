<?php
namespace Result\Mapper;

/**
 *
 * @author imaleo
 *        
 */
interface ResultMapperInterface
{
    public function findById($result_id);
    
    /**
     * 
     * @param int $user
     * @param int $session
     * @param int $term
     * @param int|array|null $subject
     */
    public function getResult($user, $session, $term, $subject);
    
    public function getTerm($student, $subject, $session);
    
    public function getSubjects($student, $session, $term);
       
    public function getUsers($session, $term, $subject);
    
    public function insert($entity);
    
    public function update($entity, $where);
    
    public function delete($where);
}

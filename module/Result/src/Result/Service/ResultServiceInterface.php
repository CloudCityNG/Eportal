<?php
namespace Result\Service;

/**
 *
 * @author imaleo
 *        
 */
interface ResultServiceInterface
{
    /**
     * 
     * @param unknown $user
     * @param unknown $session
     * @param unknown $term
     * @param unknown $subject
     * @return \Result\Model\ResultInterface
     */
    public function getResult($user, $session, $term, $subject);
    
    public function getTerm($user, $session, $subject);
    
    public function getSubject($user, $session, $term);
    
    public function hasSubject($user, $session, $term, $subject);
    
    public function getUsers($session, $term, $subject);
    
    public function findById($result_id);
    
    public function insert(\Result\Model\ResultInterface $result);
    
    public function update(\Result\Model\ResultInterface $result, $where);
    
    public function delete(\Result\Model\ResultInterface $result);
}


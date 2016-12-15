<?php
namespace Result\Service;

use Result\Model\ResultInterface;
/**
 *
 * @author imaleo
 *        
 */
interface ResultScoreServiceInterface
{
    public function getResultScore(ResultInterface $result);
    
    public function getAssessment($result);
}

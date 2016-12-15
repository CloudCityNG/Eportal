<?php
namespace Result\Model;

/**
 *
 * @author imaleo
 *        
 */
interface ResultScoreInterface
{
    public function getResult();
    public function setResult(ResultInterface $result);
    public function getAssessment();
    public function setAssessment(AssessmentInterface $assessment);
    public function setScore($score);
    public function getScore();
}


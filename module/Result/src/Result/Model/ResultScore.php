<?php
namespace Result\Model;

/**
 *
 * @author imaleo
 *        
 */
class ResultScore implements ResultScoreInterface
{
    protected $result;
    protected $assessment;
    protected $score;

    /**
     *
     * @see \Result\Model\ResultScoreInterface::setResult()
     *
     */
    public function setResult(ResultInterface $result)
    {
        $this->result = $result;
        return $this;
    }

    /**
     *
     * @see \Result\Model\ResultScoreInterface::getAssessment()
     *
     */
    public function getAssessment()
    {
        return $this->assessment;
    }

    /**
     *
     * @see \Result\Model\ResultScoreInterface::getScore()
     *
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     *
     * @see \Result\Model\ResultScoreInterface::setScore()
     *
     */
    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }

    /**
     *
     * @see \Result\Model\ResultScoreInterface::getResult()
     *
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     *
     * @see \Result\Model\ResultScoreInterface::setAssessment()
     *
     */
    public function setAssessment(AssessmentInterface $assessment)
    {
        $this->assessment = $assessment;
        return $this;
    }
}

?>
<?php
namespace Result\Mapper;

/**
 *
 * @author imaleo
 *        
 */
class ResultScoreMapper extends AbstractResultDbMapper implements ResultScoreMapperInterface
{
    protected $tableName = 'result_score';
    
    /**
     *
     * @see \Result\Mapper\ResultScoreMapperInterface::findByResult()
     *
     */
    public function findByResult($result_id)
    {
        $select = $this->getSelect()->where(array(
            'result = ?' => $result_id
        ));
        return $this->select($select);
    }

    /**
     *
     * @see \Result\Mapper\ResultScoreMapperInterface::findByAssessment()
     *
     */
    public function findByAssessment($assessment_id)
    {
        $select = $this->getSelect()->where(array(
            'assessment = ?' => $assessment_id
        ));
        return $this->select($select);
    }
    
    public function getResultScore($result_id, $assessment_id) {
        $select = $this->getSelect()->where(array(
            'assessment = ?' => $assessment_id,
            'result = ?' => $result_id
        ));
        return $this->select($select)->current();
    }
}

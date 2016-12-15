<?php
namespace Result\Service;

/**
 *
 * @author imaleo
 *        
 */
interface GradeServiceInterface
{
    /**
     * 
     * @param double $score
     * @return \Result\Model\GradeInterface
     */
    public function getGrade($score);
}

?>
<?php
namespace Result\Service;

/**
 *
 * @author imaleo
 *        
 */
class ResultDetailService implements ResultDetailServiceInterface
{
    /**
     * 
     * @var ResultServiceInterface
     */
    protected $resultService;
    
    /**
     * 
     * @var ResultScoreServiceInterface
     */
    protected $resultScoreService;
    
    /**
     * 
     * @var GradeServiceInterface
     */
    protected $gradeService;

    /**
     */
    function __construct(ResultServiceInterface $result, ResultScoreServiceInterface $resultScore, GradeServiceInterface $grade)
    {
        $this->resultService = $result;
        $this->resultScoreService = $resultScore;
        $this->gradeService = $grade;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Result\Service\ResultDetailServiceInterface::getClassAverage()
     *
     */
    public function getClassAverage($students, $subject, $session, $term)
    {
        $sum = 0;
        $null = 0;
       foreach($students as $student){
           $cumulative = $this->getCumulative($student, $subject, $session, $term);
           if(!$cumulative){
               $null++;
               continue;
           }
           $sum += $cumulative;
       }
       $total = count($students) - $null;
       return $sum/$total;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Result\Service\ResultDetailServiceInterface::getCumulative()
     *
     */
    public function getCumulative($student, $subject, $session, $terms = null)
    {
        if(!$terms){
            $terms = $this->resultService->getTerm($student, $session, $subject);
            if(!terms){
                return null;
            }
        }else{//convert terms to array if not in array. There should be a better way tho. This doesn't look good
            if(!is_array($terms)){
                $terms = array($terms);
            }
        }
        $presentCumulative = 0;
        $count = 0;
        foreach ($terms as $term){
            $average = $this->getAverage($student, $session, $term, $subject);
            $overallAverage = $average['overall_average'];
            if($count == 0){
                $presentCumulative = $overallAverage;
            }else{
                $presentCumulative = ($presentCumulative + $overallAverage)/2;
            }
            $count++;
        }
        return $presentCumulative;
    }

    public function getOverallCumulative($student, $session, $term) {
        $subjects = $this->resultService->getSubject($student, $session, $term);
        $sumCumulative = 0;
        foreach ($subjects as $subject) {
            $cumulative = $this->getCumulative($student, $session, $subject, $term);
            $sumCumulative += $cumulative;
        }
        return $sumCumulative;
    }
    
    /**
     *
     * @see \Result\Service\ResultDetailServiceInterface::getGrade()
     *
     */
    public function getGrade($student, $subject, $session, $term = null)
    {
        $cumulative = $this->getCumulative($student, $session, $subject, $term);
        return $this->gradeService->getGrade($cumulative);
        
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Result\Service\ResultDetailServiceInterface::getTeacherRemark()
     *
     */
    public function getTeacherRemark($student, $subject, $session, $term)
    {}

    /**
     *
     * @see \Result\Service\ResultDetailServiceInterface::getPosition()
     *
     */
    public function getPosition($allStudents, $theStudent, $session, $term)
    {
        if(!in_array($theStudent, $allStudents)){
            return null;
        }
        $cumulatives = [];
        foreach ($allStudents as $student){
            $sumCumulative = $this->getOverallCumulative($student, $session, $term);
            $cumulatives[$student] = $sumCumulative;
        }
        return $this->positionGetter($cumulatives, $theStudent);
    }

    public function getSubjectPosition($allStudents, $student, $subject, $session, $term) {
        if(!in_array($student, $allStudents)){
            return null;
        }
        $cumulatives = [];
        foreach ($allStudents as $student){
            $cumulative = $this->getCumulative($student,$subject, $session, $term);
            if(!$cumulative){
                continue;
            }
            $cumulatives[$student] = $cumulative;
        }
        return $this->positionGetter($cumulatives, $student);
    }
    /**
     *
     * @see \Result\Service\ResultDetailServiceInterface::getAverage()
     *
     */
    public function getAverage($student, $session, $term, $subject)
    {
        $result = $this->resultService->getResult($student, $session, $term, $subject);
        $resultScores = $this->resultScoreService->getResultScore($result);
        $sum = 0;
        $count = 0;
        foreach($resultScores as $resultScore) {
            if($resultScore->getAssessment()->isExam()){
                $examScore = $resultScore->getScore();
                continue;
            }
            $sum += $resultScore->getScore();
            $count++;
        }
        $average = $sum/$count;
        if($examScore){
            $overallAverage = ($average + $examScore)/2;
        }else{
            $overallAverage = $average;
        }
        
        return array(
            'average' => $average,
            'overall_average' => $overallAverage
        );
    }

    private function positionGetter($cumulatives, $student) {
        arsort($cumulatives);
        $count = 0; 
        $postion = 0;
        $highestCumulative = PHP_INT_MAX;
        foreach($cumulatives as $key => $cumulative){
            if($cumulative < $highestCumulative){
                $postion = $count+1;
            }
            if($student == $key) {
                return $postion;
            }
            $highestCumulative = $cumulative;
            $count++;
        }
        return null;
    }
    
    public function getResultService() {
        return $this->resultService;
    }

    public function getResultScoreService() {
        return $this->resultScoreService;
    }

    public function getGradeService() {
        return $this->gradeService;
    }

    public function setResultService(ResultServiceInterface $resultService) {
        $this->resultService = $resultService;
        return $this;
    }

    public function setResultScoreService(ResultScoreServiceInterface $resultScoreService) {
        $this->resultScoreService = $resultScoreService;
        return $this;
    }

    public function setGradeService(GradeServiceInterface $gradeService) {
        $this->gradeService = $gradeService;
        return $this;
    }

}

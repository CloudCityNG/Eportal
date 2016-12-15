<?php


namespace EportalAdmin\Model;

/**
 * Description of Class
 *
 * @author imaleo
 */
class EportalClass extends Property{
    protected $school;
    
    public function getSchool() {
        return $this->school;
    }

    public function setSchool($school) {
        $this->school = $school;
        return $this;
    }


}

<?php


namespace EportalAdmin\Model;

/**
 * Description of Department
 *
 * @author imaleo
 */
class Department extends Property {
    protected $schools;
    protected $subjects;

    public function getSchools() {
        return $this->schools;
    }

    public function getSubjects() {
        return $this->subjects;
    }

    public function setSchools($schools) {
        $this->schools = $schools;
        return $this;
    }

    public function setSubjects($subjects) {
        $this->subjects = $subjects;
        return $this;
    }

}

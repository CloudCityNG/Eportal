<?php

namespace EportalAdmin\Model;

/**
 * Description of Subject
 *
 * @author imaleo
 */
class Subject extends Property{
    protected $classes;
    
    public function getClasses() {
        return $this->classes;
    }

    public function setClasses($class) {
        $this->classes = $class;
        return $this;
    }
}

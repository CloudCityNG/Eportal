<?php
namespace EportalAdmin\Model;
/**
 *
 * @author imaleo
 *        
 */
class Section extends Property
{
    protected $classes;
    
    public function getClasses() {
        return $this->classes;
    }

    public function setClasses($class) {
        $this->classes = $class;
        return $this;
    }
}

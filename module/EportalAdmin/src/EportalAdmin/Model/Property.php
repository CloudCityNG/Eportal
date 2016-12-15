<?php


namespace EportalAdmin\Model;

class Property {
    protected $id;
    protected $value;
    
    public function getId() {
        return $this->id;
    }

    public function getValue() {
        return $this->value;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }


}

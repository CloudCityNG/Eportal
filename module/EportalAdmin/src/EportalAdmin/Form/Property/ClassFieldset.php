<?php

namespace  EportalAdmin\Form\Property;

use EportalAdmin\Model\EportalClass;
/**
 * Description of ClassFieldset
 *
 * @author imaleo
 */
class ClassFieldset extends PropertyBaseFieldset{
    
    public function __construct() {
        parent::__construct('class');
        $this->add(array(
            'name' => 'school',
            'attributes' => array(
                'type' => 'select',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'School',
                'empty_option' => 'Select School',
                'value_options' => array()
            )
        ));
        $this->get('value')->setOption('label', 'Class Name');
        $this->setObject(new EportalClass());
    }
    
    public function getInputFilterSpecification() {
        $arr = array(
            'school' => array(
                'required' => true,
            )
        );
        return array_merge(parent::getInputFilterSpecification(), $arr);
        
    }
}

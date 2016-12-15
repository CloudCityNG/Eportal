<?php


namespace EportalAdmin\Form\Property;

use EportalAdmin\Model\Subject;

/**
 * Description of SubjectFieldset
 *
 * @author imaleo
 */
class SubjectFieldset extends PropertyBaseFieldset{
    
    public function __construct() {
        parent::__construct('subject');
        $this->add(array(
            'name' => 'classes',
            'attributes' => array(
                'type' => 'select',
                'multiple' => true,
            ),
            'options' => array(
                'label' => 'Classes',
                'value_options' => array()
            )
        ));
        $this->get('value')->setOption('label', 'Subject Name');
        $this->setObject(new Subject());
    }
    
    public function getInputFilterSpecification() {
        $arr = array(
            'classes' => array(
                'required' => true
            ),
        );
        return array_merge(parent::getInputFilterSpecification(), $arr);
    }
}

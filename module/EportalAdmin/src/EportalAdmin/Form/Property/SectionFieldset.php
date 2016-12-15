<?php

namespace EportalAdmin\Form\Property;

use EportalAdmin\Model\Section;

/**
 *
 * @author imaleo
 *        
 */
class SectionFieldset extends PropertyBaseFieldset {

    public function __construct($name = 'section') {
        parent::__construct($name);
        $this->add(array(
            'name' => 'classes',
            'attributes' => array(
                'type' => 'Zend\Form\Element\Select',
                'multiple' => true,
            ),
            'options' => array(
                'label' => 'Classes',
                'value_options' => array()
            )
        ));
        $this->get('value')->setOption('label', 'Section Name');
        $this->setObject(new Section());
    }

    /**
     *
     * @see PropertyBaseFieldset::getInputFilterSpecification()
     *
     */
    public function getInputFilterSpecification() {
        $arr = array(
            'classes' => array(
                'required' => true
            ),
        );
        return array_merge(parent::getInputFilterSpecification(), $arr);
    }

}

<?php

namespace EportalAdmin\Form\Property;

use EportalAdmin\Model\Department;

/**
 * Description of DepartmentFieldset
 *
 * @author imaleo
 */
class DepartmentFieldset extends PropertyBaseFieldset{
    public function __construct() {
        parent::__construct('department');
        $this->add(array(
            'name' => 'schools',
            'attributes' => array(
                'type' => 'select',
                'multiple' => true,
            )
        ));
        $this->add(array(
            'name' => 'subjects',
            'attributes' => array(
                'type' => 'select',
                'multiple' => true,
            ),
            'options' => array(
                'label' => 'Schools',
                'value_options' => array()
            )
        ));
        $this->get('value')->setOption('label', 'Department Name');
        $this->setObject(new Department());
    }

    public function getInputFilterSpecification() {
        $arr = array(
            'schools' => array(
                'required' => true
            ),
            'subjects' => array(
                'required' => true
            )
        );
        return array_merge($arr, parent::getInputFilterSpecification());
    }

}

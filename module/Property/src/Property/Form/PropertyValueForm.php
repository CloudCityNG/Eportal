<?php


namespace Property\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of PropertyValueForm
 *
 * @author imaleo
 */
class PropertyValueForm extends Form{
    public function __construct($name = null) {
        parent::__construct($name);
        $this->setAttribute('method', 'POST')
                ->setHydrator(new ClassMethods(FALSE))
                ->setInputFilter(new InputFilter);
        $this->add(array(
            'name' => 'property_value',
            'type' => 'Property\Form\PropertyValueFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            )
        ));
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Zend\Form\Element\Csrf'
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Add'
            )
        ));
    }
}

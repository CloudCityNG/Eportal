<?php

namespace EportalAdmin\Form\Property;

use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods;
use ZfcBase\Form\ProvidesEventsForm;



/**
 * Description of PropertyForm
 *
 * @author imaleo
 */
class PropertyForm extends ProvidesEventsForm{
    
    public function __construct($name, $baseFieldset) {
        parent::__construct($name);
        $this->setAttribute('method', 'POST')
                ->setHydrator(new ClassMethods(FALSE))
                ->setInputFilter(new InputFilter);
        
        $this->add($baseFieldset);
        $this->setBaseFieldset($baseFieldset);
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

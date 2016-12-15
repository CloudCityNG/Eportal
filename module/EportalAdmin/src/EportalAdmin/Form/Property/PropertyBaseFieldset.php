<?php


namespace EportalAdmin\Form\Property;

use EportalAdmin\Model\Property;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of PropertyBaseFieldset
 *
 * @author imaleo
 */
class PropertyBaseFieldset extends Fieldset implements InputFilterProviderInterface{
    
    public function __construct($name = null) {
        parent::__construct($name);
        $this->add(array(
            'name' => 'id',
            'type' => 'hidden'
        ));
        $this->add(array(
            'name' => 'value',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required'
            ),
        ));
        $this->setObject(new Property())
                ->setHydrator(new ClassMethods(false));
    }
    
    public function getInputFilterSpecification() {
        return array(
            'value' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                    )
                )
                
            )
        );
    }

}

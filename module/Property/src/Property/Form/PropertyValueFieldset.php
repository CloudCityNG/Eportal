<?php
namespace Property\Form;

use Property\Model\PropertyInterface;
use Property\Model\PropertyValue;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 *
 * @author imaleo
 *        
 */
class PropertyValueFieldset extends Fieldset implements InputFilterProviderInterface
{
    
    public function __construct($name = null){
//        if(!$name){
//            $name = 'property-value';
//        }
        parent::__construct($name);
//        $label = 'Value';
//        if($name) {
//            $label = ucfirst($name).' Name';
//        }
        $this->add(array(
                'name' => 'id',
                'type' => 'hidden'
            ));
        $this->add(array(
                'name' => 'value',
                'type' => 'text',
                'attributes' => array(
                    'required' => 'required',
                ),
//                'options' => array(
//                    'label' => $label,
//                )
            ));
        
        $this->setObject(new PropertyValue())
                ->setHydrator(new \Zend\Stdlib\Hydrator\ClassMethods(FALSE));
    }
    /**
     *
     * @see InputFilterProviderInterface::getInputFilterSpecification()
     *
     */
    public function getInputFilterSpecification()
    {
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

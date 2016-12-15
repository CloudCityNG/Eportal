<?php
namespace Property\Model;

/**
 *
 * @author imaleo
 *        
 */
interface JointPropertyValueInterface
{
    public function getId();
    public function setId($id);
    public function getFirstPropertyValue();
    public function setFirstPropertyValue(PropertyValueInterface $fpv);
    public function getSecondPropertyValue();
    public function setSecondPropertyValue(PropertyValueInterface $spv);
}


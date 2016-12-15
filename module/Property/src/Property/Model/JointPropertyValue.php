<?php
namespace Property\Model;

/**
 *
 * @author imaleo
 *        
 */
class JointPropertyValue implements JointPropertyValueInterface
{

    private $id;
    private $fpv;
    private $spv;
    /**
     */
    function __construct($id = null, PropertyValueInterface $fpv = null, PropertyValueInterface $spv = null)
    {
        $this->id = $id;
        $this->fpv = $fpv;
        $this->spv = $spv;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Property\Model\JointPropertyValueInterface::getFirstPropertyValue()
     *
     */
    public function getFirstPropertyValue()
    {
        return $this->fpv;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Property\Model\JointPropertyValueInterface::setSecondPropertyValue()
     *
     */
    public function setSecondPropertyValue(PropertyValueInterface $spv)
    {
        $this->spv = $spv;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Property\Model\JointPropertyValueInterface::setFirstPropertyValue()
     *
     */
    public function setFirstPropertyValue(PropertyValueInterface $fpv)
    {
        $this->fpv = $fpv;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Property\Model\JointPropertyValueInterface::getSecondPropertyValue()
     *
     */
    public function getSecondPropertyValue()
    {
        return $this->spv;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Property\Model\JointPropertyValueInterface::setId()
     *
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Property\Model\JointPropertyValueInterface::getId()
     *
     */
    public function getId()
    {
        return $this->id;
    }
}

?>
<?php
namespace Property\Mapper;


/**
 *
 * @author imaleo
 *        
 */
class PropertyValueMapper extends AbstractPropertyDbMapper implements PropertyValueMapperInterface
{

    protected $tableName = 'property_value';

    public function findAll()
    {
        return $this->select($this->getSelect());
    }

    public function findById($id)
    {
        $select = $this->getSelect()->where(array(
            'id = ?' => $id
        ));
        return $this->select($select)->current();
    }

    public function findByProperty($property)
    {
        $select = $this->getSelect()->where(array(
            'property = ?' => $property
        ));
        return $this->select($select);
    }
}

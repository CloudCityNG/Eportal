<?php
namespace Property\Mapper;

/**
 *
 * @author imaleo
 *        
 */
class PropertyMapper extends AbstractPropertyDbMapper implements PropertyMapperInterface
{

    protected $tableName = 'property';
    
    /**
     */
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

    public function findByName($name)
    {
        $select = $this->getSelect()->where(array(
            'name = ?' => $name
        ));
        return $this->select($select)->current();
    }
}


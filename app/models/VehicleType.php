<?php

class VehicleType
{
    private $db;
    /**
     * @var string
     */
    private $tableName;

    public function __construct()
    {
        $this->db = new Database;
        $this->tableName = 'vehicle_types';
    }

    public function create($dto) {
        $this->db->query('INSERT INTO '.$this->tableName.' (name, user_id) VALUES(:name, :user_id)');

        //Bind values
        $this->db->bind(':name', $dto->getName());
        $this->db->bind(':user_id', $dto->getUserId());

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->query('SELECT * FROM '.$this->tableName.' WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    //get all rows with pagination
    public function getAll($recordsPerPage,$offset) : array
    {
        $this->db->query('SELECT * FROM '.$this->tableName.' ORDER BY id DESC '.' LIMIT '.$recordsPerPage.' OFFSET '.$offset);
        return $this->db->resultSet();
    }

//    get all count
    public function getCount() : int
    {
        $this->db->query('SELECT * FROM '. $this->tableName);
        return $this->db->rowCount();
    }

//    find unique row
    public function findCountByName($name):bool
    {
        $this->db->query('SELECT * FROM '.$this->tableName.' WHERE name = :name');

        $this->db->bind(':name', $name);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

//    update row
    public function update($dto) {
        $this->db->query('UPDATE '.$this->tableName.' SET 
          name = :name,
          user_id  = :user_id
          WHERE id = :id');

        //Bind values
        $this->db->bind(':name', $dto->getName());
        $this->db->bind(':user_id', $dto->getUserId());
        $this->db->bind(':id', $dto->getId());

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

//    delete row by id
    public function deleteById($id) {
        $this->db->query('DELETE FROM '.$this->tableName.' WHERE id = :id');
        //Bind values
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

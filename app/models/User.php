<?php

class User
{
    private $db;
    /**
     * @var string
     */
    private $tableName;

    public function __construct()
    {
        $this->db = new Database;
        $this->tableName = 'users';
    }

    //Login user logic
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM '.$this->tableName.' WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        if ($row) {
            $hashedPassword = $row->password;
        } else {
            return false;
        }

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //new user logic
    public function register($data)
    {
        $this->db->query('INSERT INTO '.$this->tableName.' (email, password) VALUES(:email, :password)');

        //Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email unique
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM '.$this->tableName.' WHERE email = :email');

        $this->db->bind(':email', $email);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}


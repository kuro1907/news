<?php

namespace Model;

use Model\DBConnection;

class User
{
    public $id;
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $email;

    public function __construct($username, $password, $firstName, $lastName, $email, $role = 'user')
    {
        $this->username     = $username;
        $this->password     = $password;
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->email        = $email;
        $this->role         = $role;
    }
}

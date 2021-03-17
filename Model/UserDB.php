<?php

namespace Model;

class UserDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }


    public function create($user)
    {
        $sql = "INSERT INTO user_manager (`username`,`password`,`firstName`,`lastName`,`email`)VALUE (?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $user->username);
        $statement->bindParam(2, $user->password);
        $statement->bindParam(3, $user->firstName);
        $statement->bindParam(4, $user->lastName);
        $statement->bindParam(5, $user->email);
        return $statement->execute();
    }

    public function search($search)
    {

        $sql = "SELECT * FROM `user_manager` WHERE `username` LIKE \"$search\"";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        if (isset($result) && count($result) >   0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function searchEmail($search)
    {

        $sql = "SELECT * FROM `user_manager` WHERE `email` LIKE \"$search\"";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        if (isset($result) && count($result) >   0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM user_manager WHERE `username` = ? AND `password` = ?";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $password);
        $statement->execute();
        $result = $statement->fetchAll();
        $users = [];
        if (isset($result) && count($result) > 0) {
            foreach ($result as $row) {
                $user = new User($row['username'], $row['password'], $row['firstName'], $row['lastName'], $row['email'], $row['role']);
                $user->id = $row['id'];
                $user->role = $row['role'];
                $users[] = $user;
            }
            return $users;
        } else {
            return NULL;
        }
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user_manager";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        $users = [];
        foreach ($result as $row) {
            $user = new User($row['username'], $row['password'], $row['firstName'], $row['lastName'], $row['email'], $row['role']);
            $user->id = $row['id'];
            $user->role = $row['role'];
            $users[] = $user;
        }
        // var_dump($users);
        // die();
        return $users;
    }



    public function getById($id)
    {
        $sql = "SELECT * FROM user_manager WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetchAll();
        $user = new User(
            $result[0]['username'],
            $result[0]['password'],
            $result[0]['firstName'],
            $result[0]['lastName'],
            $result[0]['email'],
            $result[0]['role']
        );

        $user->id = $result[0]['id'];
        return ($user);
    }
}

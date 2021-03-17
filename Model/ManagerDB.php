<?php

namespace Model;

class ManagerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM user_manager WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetchAll(); // Associative Array

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

    public function editUser($password, $firstName, $lastName,  $role, $id)
    {
        $sql = "UPDATE user_manager SET `password`=?,`firstName` = ?,`lastName` = ?,`role`=? WHERE `id` = ?;";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $password);
        $statement->bindParam(2, $firstName);
        $statement->bindParam(3, $lastName);
        $statement->bindParam(4, $role);
        $statement->bindParam(5, $id);
        return $statement->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM user_manager WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function getByIdNews($id)
    {
        $sql = "SELECT * FROM news WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetchAll(); // Associative Array

        $new = new NewPost(
            $result[0]['title'],
            $result[0]['info'],
            $result[0]['dayRelease'],
            $result[0]['img'],
            $result[0]['linkPost'],
            $result[0]['isSelected'],
            $result[0]['category'],
            $result[0]['content']
        );
        $new->id = $result[0]['id'];

        return ($new);
    }

    public function editNew($title, $info, $img,  $linkPost, $category, $isSelected, $content, $id)
    {
        $sql = "UPDATE news SET `title`=?,`info` = ?,`img` = ?,`linkPost`=?,`category`=?,`isSelected`=?,`content`=? WHERE `id` = ?;";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $title);
        $statement->bindParam(2, $info);
        $statement->bindParam(3, $img);
        $statement->bindParam(4, $linkPost);
        $statement->bindParam(5, $category);
        $statement->bindParam(6, $isSelected);
        $statement->bindParam(7, $content);
        $statement->bindParam(8, $id);
        return $statement->execute();
    }

    public function deleteNews($id)
    {
        $sql = "DELETE FROM news WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function createNew($new)
    {
        $sql = "INSERT INTO news (`title`,`info`,`dayRelease`,`img`,`linkPost`,`isSelected`,`category`,`content`)VALUE (?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $new->title);
        $statement->bindParam(2, $new->info);
        $statement->bindParam(3, $new->dayRelease);
        $statement->bindParam(4, $new->img);
        $statement->bindParam(5, $new->linkPost);
        $statement->bindParam(6, $new->isSelected);
        $statement->bindParam(7, $new->category);
        $statement->bindParam(8, $new->content);
        return $statement->execute();
    }
}

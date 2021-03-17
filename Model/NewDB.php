<?php

namespace Model;

class NewDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllNews()
    {
        $sql = "SELECT * FROM news ORDER BY dayRelease DESC;";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        $news = [];
        foreach ($result as $row) {
            $new = new NewPost($row['title'], $row['info'], $row['dayRelease'], $row['img'], $row['linkPost'], $row['isSelected'], $row['category'], $row['content']);
            $new->id = $row['id'];
            $news[] = $new;
        }
        return $news;
    }

    public function getNewsByCategory($category)
    {
        $sql = "SELECT * FROM news WHERE `category` = '$category' ORDER BY `dayRelease`  DESC;";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $news = [];
        foreach ($result as $row) {
            $new = new NewPost($row['title'], $row['info'], $row['dayRelease'], $row['img'], $row['linkPost'], $row['isSelected'], $row['category'], $row['content']);
            $new->id = $row['id'];
            $news[] = $new;
        }
        return $news;
    }

    public function getNewById($id)
    {
        $sql = "SELECT * FROM news WHERE `id`=$id;";
        $statement = $this->connection->prepare($sql);
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
}

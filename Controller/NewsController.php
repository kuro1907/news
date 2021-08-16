<?php

namespace Controller;


include_once("./Model/DBConnection.php");
include_once("./Model/NewDB.php");
include_once("./Model/NewPost.php");

use \Model\DBConnection;
use \Model\NewDB;
use \Model\NewPost;

class NewsController
{
    public $newDb;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost:3306;dbname=case_study", "root", "");

        $this->newDb = new NewDB($connection->connect());
    }

    public function index()
    {
        return $this->newDb->getAllNews();
    }

    public function getNewsByCategory()
    {
        $category = $_GET['category'];
        if ($category != 'all') {
            $news = $this->newDb->getNewsByCategory($category);
        } else {
            $news = $this->newDb->getAllNews();
        }
        include 'category.php';
    }

    public function getNewById()
    {
        $id = $_GET['id'];
        $new = $this->newDb->getNewById($id);
        include 'post.php';
    }
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
$controller = new NewsController();

switch ($action) {
    case 'posts':
        $controller->getNewsByCategory();
        break;
    case 'post':
        $controller->getNewById();
        break;
    default:
        $news = $controller->index();
        break;
}

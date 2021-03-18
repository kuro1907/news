<?php

namespace Controller;


include_once("./Model/DBConnection.php");
include_once("./Model/ManagerDB.php");
include_once("./Model/User.php");
include_once("./Model/UserDB.php");
include_once("./Model/NewPost.php");
include_once("./Model/NewDB.php");

use \Model\DBConnection;
use \Model\ManagerDB;
use \Model\NewDB;
use \Model\NewPost;
use \Model\User;

class ManagerController
{
    public $managerDb;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost:3306;dbname=case_study", "root", "");

        $this->managerDb = new ManagerDB($connection->connect());
    }

    public function index()
    {
        include 'View/Manager/welcome.php';
    }

    public function NewsManager()
    {
        include 'View/Manager/newsmanager.php';
    }

    public function UsersManager()
    {
        include 'View/Manager/usersmanager.php';
    }

    public function Detail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;
            $user = $this->managerDb->getById($id);
            include 'View/Manager/showInfoUser.php';
        }
    }

    public function EditUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;
            $user = $this->managerDb->getById($id);
            include 'View/Manager/showInfoUser.php';
        } else {
            $password           = $_POST['password'];
            $firstName          = $_POST['firstName'];
            $lastName           = $_POST['lastName'];
            $role               = $_POST['role'];
            $id                 = $_GET['id'];

            $this->managerDb->editUser($password, $firstName, $lastName, $role, $id);
            $message = 'Người dùng đã được chỉnh sửa thành công';
            $_SESSION['message'] = $message;
            header('Location:/?controller=manager&action=users');
        }
    }

    public function Delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;
            $user = $this->managerDb->getById($id);
            include 'View/Manager/delete.php';
        } else {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $user = $_SESSION['username'];
            if ($user == $username) {
                $this->managerDb->delete($id);
                session_destroy();
                header('Location:/?controller=user&action=signin');
            } else {
                $this->managerDb->delete($id);
                $message = 'Người dùng đã được xóa thành công';
                $_SESSION['message'] = $message;
                header('Location:/?controller=manager&action=users');;
            }
        }
    }

    public function DetailNews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;
            $new = $this->managerDb->getByIdNews($id);
            // var_dump($new);
            // die();
            include 'View/Manager/showInfoNews.php';
        }
    }

    public function EditNews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;
            $new = $this->managerDb->getByIdNews($id);
            include 'View/Manager/showInfoNews.php';
        } else {

            $title      = $_POST['title'];
            $info       = $_POST['info'];
            $img        = $_POST['img'];
            $linkPost   = $_POST['linkPost'];
            $category   = $_POST['category'];
            $isSelected = $_POST['isSelected'];
            $id         = $_GET['id'];
            $content    = $_POST['content'];
            // var_dump($isSelected);
            // die();

            $test = $this->managerDb->editNew($title, $info, $img,  $linkPost, $category, $isSelected, $content, $id);
            if ($test) {
                $message = 'Bài viết đã được chỉnh sửa thành công';
                $_SESSION['message'] = $message;
                header('Location:/?controller=manager&action=news');
            } else {
                echo 'ngu';
            }
        }
    }

    public function DeleteNews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = isset($_GET['id']) ? $_GET['id'] : NULL;
            $new = $this->managerDb->getByIdNews($id);
            include 'View/Manager/deleteNews.php';
        } else {
            $id = $_POST['id'];
            $this->managerDb->deleteNews($id);
            $message = 'Bài viết đã được xóa thành công';
            include 'View/Manager/deleteNews.php';
        }
    }

    public function AddNews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $idNewest = $this->managerDb->getId();
            include 'View/Manager/showInfoNews.php';
        } else {
            $title          = $_POST['title'];
            $info           = $_POST['info'];
            $dayRelease     = date('Y-m-d');
            $img            = $_POST['img'];
            $linkPost       = $_POST['linkPost'];
            $isSelected     = $_POST['isSelected'];
            $category       = $_POST['category'];
            $content        = $_POST['content'];

            $new = new NewPost($title, $info, $dayRelease, $img, $linkPost, $isSelected, $category, $content);
            $test = $this->managerDb->createNew($new);

            if ($test) {
                $success = 'Đăng bài viết thành công';
                header('Location:/?controller=manager&action=news');
            } else {
                echo 'ngu';
            }
        }
    }
}

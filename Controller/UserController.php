<?php

namespace Controller;


include_once("./Model/DBConnection.php");
include_once("./Model/UserDB.php");
include_once("./Model/User.php");

use \Model\DBConnection;
use \Model\UserDB;
use \Model\User;

class UserController
{

    public $userDb;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost:3306;dbname=case_study", "root", "");

        $this->userDb = new UserDB($connection->connect());
    }

    public function signup()
    {
        include 'View/User/register.php ';
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username       = $_POST['username'];
            $password       = $_POST['password'];
            $repeatPassword = $_POST['repeatPassword'];
            $firstName      = $_POST['firstName'];
            $lastName       = $_POST['lastName'];
            $email          = $_POST['email'];
            if ($username == "" || $password == "" || $firstName == "" || $lastName == "" || $email == "") {
                $message = 'Vui lòng nhập đầy đủ thông tin';
            } else if ($password !== $repeatPassword) {
                $message = 'Vui lòng nhập mật khẩu khớp nhau';
            } else {
                $user = new User($username, $password, $firstName, $lastName, $email);

                if ($this->userDb->search($user->username)) {
                    $message = 'Tên đăng nhập đã có người sử dụng';
                } else if ($this->userDb->searchEmail($user->email)) {
                    $message = 'Email đã có người sử dụng';
                } else {
                    $this->userDb->create($user);
                    $success = 'Đăng ký thành công';
                }
            }
            include 'View/User/register.php';
        }
    }

    public function signin()
    {

        include 'View/User/login.php';
    }

    public function log_in()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userDb->login($username, $password);
            if (!isset($user)) {
                $message = "Sai tên đăng nhập hoặc mật khẩu";
                include 'View/User/login.php';
            } else {
                $role = $user['0']->role;
                // var_dump($role);
                // die();
                switch ($role) {
                    case 'manager':
                        $_SESSION['username']   = $user['0']->username;
                        $_SESSION['role']       = $user['0']->role;
                        header('Location:?controller=manager&action=index');
                        break;
                    case 'user':
                        $_SESSION['username']   = $user['0']->username;
                        $_SESSION['role']       = $user['0']->role;
                        header('Location:/');
                        break;
                }
            }
        }
    }

    public function logout()
    {
        header('location:View/User/logout.php');
    }

    public function forgot()
    {
        include 'View/User/forgot_password.php';
    }

    public function user_manager()
    {
        return $this->userDb->getAllUsers();
    }

    public function editUser()
    {
    }
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
$controller = new UserController();

switch ($action) {
    case 'signin':
        $controller->signin();
        break;
    case 'login':
        $controller->log_in();
        break;
    case 'signup':
        $controller->signup();
        break;
    case 'register':
        $controller->register();
        break;
    case 'logout':
        $controller->logout();
        break;
    case 'forgot':
        $controller->forgot();
        break;
    case 'users':
        $users = $controller->user_manager();
        break;
        // case 'edit':
        //     $users = editUser();
        //     include 'Views/showInfoUser.php';
        //     break;
    case 'details':
        $users = $controller->user_manager();
        break;
}

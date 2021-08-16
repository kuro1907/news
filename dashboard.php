<?php

use Controller\ManagerController;

require "Model/UserDB.php";
require "Model/User.php";
require "Controller/ManagerController.php";

if ($_SESSION['role'] !== 'manager') {
    header('Location:error.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
</head>

<body>
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?controller=manager&action=index">
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>
            <span class="user-text">Xin chào <?php echo $_SESSION['username']; ?></span>
            <br>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="?controller=manager&action=index">
                    <span>Trang chủ</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tin tức
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="?controller=manager&action=news" aria-expanded="true">
                    <span>Quản lý bài viết</span>
                </a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Thành viên
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="?controller=manager&action=users" aria-expanded="true">
                    <span>Quản lý Thành Viên</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Website
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/index.php" aria-expanded="true">
                    <span>Trở lại trang chủ</span>
                </a>
            </li>
        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
                $controller = new ManagerController();
                switch ($action) {
                    case 'news':
                        $controller->NewsManager();
                        break;
                    case 'users':
                        $controller->UsersManager();
                        break;
                    case 'add':
                        $controller->AddNews();
                        break;
                    case 'details':
                        $controller->Detail();
                        break;
                    case 'edit':
                        $controller->EditUser();
                        break;
                    case 'delete':
                        $controller->Delete();
                        break;
                    case 'detailnews':
                        $controller->DetailNews();
                        break;
                    case 'editnews':
                        $controller->EditNews();
                        break;
                    case 'deletenews':
                        $controller->DeleteNews();
                        break;
                    default:
                        $controller->index();
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
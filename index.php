<?php
session_start();
$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : NULL;

switch ($controller) {
    case 'manager':
        require "dashboard.php";
        break;
    default:
        require "Controller/NewsController.php";
        require "Controller/UserController.php";
        if ($action == null) {
            require 'main.php';
        }
        break;
}

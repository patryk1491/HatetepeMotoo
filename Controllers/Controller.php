<?php
require_once('classes/Database.php');

class Controller extends Database {

    public static function CreateView($viewName) {
        require_once('Views/Header.php');
        require_once('Views/Menu.php');
        require_once("./Views/$viewName.php");
        require_once('Views/Footer.php');
    }

    public static function sessionSetLoggedIn($loggedIn) {
        $_SESSION['logged_in'] = $loggedIn;
    }

    public static function sessionSetUserId($userId) {
        $_SESSION['user_id'] = $userId;
    }
}
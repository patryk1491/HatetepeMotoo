<?php
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class LoginController extends Controller {
    public static function loginAction() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $loginResult = SessionModel::loginAction($username, $password);

            if($loginResult != null) {
                if($loginResult[0]['confirmed'] == 1 || $loginResult[0]['confirmed'] == 0) {
                    Controller::sessionSetUserId($loginResult[0]['user_id']);
                    Controller::sessionSetLoggedIn(true);
                    header("location: my-ads");
                }
                else {
                    echo('<h2 class="error">Please confirm your account!</h2>');
                }
            } else {
                echo('<h2 class="error">Your Login Name or Password is invalid!</h2>');
            }
        }
    }
}
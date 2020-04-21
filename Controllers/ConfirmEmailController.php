<?php
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class ConfirmEmailController extends Controller {
    public static function confirmEmail($email) {
        AdvertModel::confirmEmail($email);
    }
}
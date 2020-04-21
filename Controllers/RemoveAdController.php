<?php
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class RemoveAdController extends Controller {
    public static function removeRowById() {
        $idToRemove = $_POST['remove'];
        AdvertModel::removeRowById($idToRemove);
        header("location: my-ads");
    }
}
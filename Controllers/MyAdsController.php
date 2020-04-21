<?php
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class MyAdsController extends Controller {
    public static function getAllDataByUserId($userId) {
        return AdvertModel::getAllDataByUserId($userId);
    }
}
<?php
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class HomeController extends Controller {
    public static function getAllData() {
        return AdvertModel::getAllData('ads');
    }

    public static function getFilteredData($table, $filteredMarke, $minprice, $maxprice) {
        return AdvertModel::getFilteredData('ads',$filteredMarke,$minprice,$maxprice);
    }

    public static function getFilteredDataAllMakes($table, $filteredMarke, $minprice, $maxprice) {
        return AdvertModel::getFilteredDataAllMakes('ads',$filteredMarke,$minprice,$maxprice);
    }

    public static function getUserNameById($id) {
        return AdvertModel::getUserNameById($id);
    }

    public static function getUserNumberById($id) {
        return AdvertModel::getUserNumberById($id);
    }

    public static function addComment() {
        $adId = $_POST['ad-id'];
        $comment = $_POST['comment-content'];
        $_POST = array();
        AdvertModel::addComment($adId, $comment);
    }

    public static function getComments($id) {
        return AdvertModel::getComments($id);
    }

}
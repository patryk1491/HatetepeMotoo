<?php
require_once('Model.php');

class AdvertModel extends Model {
    //
    // Getting all ads to show on homepage
    //
    public static function getAllData($table) {
        return(self::query("
            SELECT id, id_user, marka, model, rok_produkcji, cena, img_filename 
            FROM {$table}
         "));
    }

    //
    // Getting filtered ads to show on homepage
    //
    public static function getFilteredData($table, $marka, $minprice, $maxprice) {
        if($marka !== '') {
            return(self::query("
                SELECT id, id_user, marka, model, rok_produkcji, cena, img_filename 
                FROM {$table}
                WHERE marka='$marka' AND cena>{$minprice} AND cena<{$maxprice}
             "));
        }
        else {
            return (self::query("
                SELECT id, id_user, marka, model, rok_produkcji, cena, img_filename 
                FROM {$table}
                WHERE cena>={$minprice} AND cena<={$maxprice}
            "));
        }
    }

    //
    // Getting filtered ads to show on homepage with all makes
    //
    public static function getFilteredDataAllMakes($table, $marka, $minprice, $maxprice)
    {
        return (self::query("
            SELECT id_user, marka, model, rok_produkcji, cena, img_filename 
            FROM {$table}
            WHERE cena>{$minprice} AND cena<{$maxprice}
         "));
    }

    //
    // Getting all ads for specific user
    //
    public static function getAllDataByUserId($userId) {
        return(self::query("
            SELECT id, marka, model, rok_produkcji, cena, img_filename 
            FROM ads
            WHERE id_user='$userId'
        "));
    }

    //
    // Getting username for specific ad by ad's id
    //
    public static function getUserNameById($id) {
        $userName = self::query("SELECT login FROM users WHERE id='$id'");
        return $userName[0]['login'];
    }

    //
    // Getting user's phone number for specific ad by ad's id
    //
    public static function getUserNumberById($id) {
        $userName = self::query("SELECT phone FROM users WHERE id='$id'");
        return $userName[0]['phone'];
    }

    //
    // Method for adding ad
    //
    public static function addAdvert($marka, $model, $rok_produkcji, $cena, $id_user, $img_filename) {
        self::query("
            INSERT into ads (marka, model, rok_produkcji, cena, id_user, img_filename)
            VALUES ('$marka', 
            '$model',  '$rok_produkcji', '$cena', '$id_user', '$img_filename')
        ");
    }

    //
    // Method for editing ad
    //
    public static function editAd($id, $newMark, $newModel, $newYear, $newPrice, $newImg) {
        if($newImg != '') {
            self::query("
                UPDATE ads
                SET marka='$newMark', model='$newModel', rok_produkcji='$newYear', cena='$newPrice', img_filename='$newImg'
                WHERE id='$id'
            ");
        }
        else {
            self::query("
                UPDATE ads
                SET marka='$newMark', model='$newModel', rok_produkcji='$newYear', cena='$newPrice'
                WHERE id='$id'
            ");
        }
    }

    //
    // Method for removing ad by it's id
    //
    public static function removeRowById($id) {
        self::query("DELETE FROM ads WHERE id='$id'");
    }

    public static function confirmEmail($email) {
        self::query("UPDATE users SET confirmed=1 WHERE email='$email'");
    }

    //
//
//
    public static function addComment($adId, $comment) {
        self::query("
        INSERT INTO comments (ad_id, content)
        VALUES ('$adId','$comment')
    ");
    }

    //
    //
    //
    public static function getComments($id) {
        return(self::query("
        SELECT content from comments WHERE ad_id='$id'
    "));
    }

}
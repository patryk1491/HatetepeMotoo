<?php
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class EditAdController extends Controller {
    public static function editAd() {
        $id = $_POST['id'];
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $rok_produkcji = $_POST['rok_produkcji'];
        $cena = $_POST['cena'];
        $img = $_POST['img_filename'];
        AdvertModel::editAd($id, $marka, $model, $rok_produkcji, $cena, $img);
        if (is_uploaded_file($_FILES['img_filename']['tmp_name'])) {
            echo 'Odebrano plik. Początkowa nazwa: ' . $_FILES['img_filename']['name'];
            echo '<br/>';
            if (isset($_FILES['img_filename']['type'])) {
                echo 'Typ: ' . $_FILES['img_filename']['type'] . '<br/>';
            }
            move_uploaded_file($_FILES['img_filename']['tmp_name'],
                $_SERVER['DOCUMENT_ROOT'] . '/public/img/' . $_FILES['img_filename']['name']);
        } else {
            echo 'Błąd przy przesyłaniu danych!';
        }
        header("location: my-ads");
    }
}
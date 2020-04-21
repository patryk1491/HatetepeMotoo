<?php
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class AddAdController extends Controller {
    public static function addAdvert() {
        $marka = (isset($_POST['marka']) && $_POST['marka'] !== '') ? $_POST['marka'] : null;
        $model = (isset($_POST['model']) && $_POST['model'] !== '') ? $_POST['model'] : null;
        $rok_produkcji = (isset($_POST['Production']) && $_POST['Production'] !== '') ? $_POST['Production'] : null;
        $cena = (isset($_POST['cena']) && $_POST['cena'] !== '') ? $_POST['cena'] : null;
        $img = (isset($_FILES['img_filename']['name']) && $_FILES['img_filename']['name'] !== '') ? $_FILES['img_filename']['name'] : "0.png";
        $idUser = $_SESSION['user_id'];

        echo($_POST);

        if(!empty($marka || $model || $rok_produkcji || $cena)) {
            AdvertModel::addAdvert($marka, $model, $rok_produkcji, $cena, $idUser, $img);
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
        else echo('<div class="error">Please fill out all required fields!</div>');

    }
}
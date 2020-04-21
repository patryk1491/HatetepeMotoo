<?php
    if(isset($_POST['submit'])){
        if(isset($_POST['remove'])) RemoveAdController::removeRowById();
        else if (isset($_POST['edit'])) EditAdController::editAd();
    }
?>
<div class="list-of-ads-container">
    <?php
    $loggedIn = (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== '') ? $_SESSION['logged_in'] : false;
    if($loggedIn) {
        echo('<h2>My Ads:</h2>');
        $user_id = $_SESSION['user_id'];
        $listOfAds = (MyAdsController::getAllDataByUserId($user_id));
        foreach ($listOfAds as $ad) : ?>
            <div class="single-ad">
                <?php
                    if(['img_filename'] != '') $image = $ad['img_filename'];
                    else $image = '0.png';

                    $adToEdit = base64_encode(serialize($ad));
                ?>
                    <div class='zdjecie'><img src='http://olczykpazik.eu/public/img/<?php echo $image ?>'></div>
                    <div class='info'>
                        <div class='marka'><?php echo $ad['marka'] .' '. $ad['model'] ?></div>
                        <div class='rok-produkcji'>Production: <?php echo $ad['rok_produkcji'] ?></div>
                        <div class='cena'>Price: <?php echo $ad['cena'] ?>zł</div>

                        <form action='remove-ad' method="post" class="removeb">
                            <button type="submit" name='remove' value=<?php echo $ad['id'] ?> class="btn btn-danger"'>Delete</button>
                        </form>

                        <form action='edit-ad' method="post" class="editb">
                            <button type="submit" name='edit' value=<?php echo $adToEdit ?> class="btn btn-primary"'>Edit ad</button>
                        </form>
                    </div>
            </div>
        <?php endforeach;
    }
    else {
        echo('<h2 class="notlogged">You are not logged in!</h2>');
    }
    ?>
</div>
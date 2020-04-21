<?php
    $filteredMarka = isset($_POST['marka']) ? ($_POST['marka']) : 'All-makes';
    $minPrice = isset($_POST['minprice']) ? ($_POST['minprice']) : 0;
    $maxPrice = isset($_POST['maxprice']) ? ($_POST['maxprice']) : 1000000;
    if ($filteredMarka == 'All-makes'  && $minPrice == 0 && $maxPrice == 1000000) {
        $listOfAds = (HomeController::getAllData());
    }
    else if($filteredMarka == 'All-makes' && ($minPrice !== 0 || $maxPrice !== 1000000)) {
        $listOfAds = (HomeController::getFilteredDataAllMakes('ads', $filteredMarka, $minPrice, $maxPrice));
    }
    else {
        $listOfAds = (HomeController::getFilteredData('ads', $filteredMarka, $minPrice, $maxPrice));
    }

    if(isset($_POST['sendComment'])) {
        HomeController::addComment();
        $_POST = array();
    }
    ?>
<div class="list-of-ads-container">
    <h2>List of all ads:</h2>
        <div class="filters">
            <form action="" method="post">
                <div class="form-row">
                    <div class="col">
                        <label for="formGroupExampleInput">Select make</label>
                        <select id="formGroupExampleInput" name="marka" class="form-control" >
                            <?php if(isset($_POST['marka']))
                                {
                                    echo('<option selected value='.$_POST['marka'].'>'.$_POST['marka'].'</option>');
                                }
                                include 'src/Forms.php';
                                echo $makesOptions;
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label>Minimal price</label>
                        <select name="minprice" class="form-control" >
                            <?php
                                echo('<option selected value='.$minPrice.'>'.$minPrice.'</option>');
                                include 'src/Forms.php';
                                echo $minPriceselect;
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label>Maximum price</label>
                        <select name="maxprice" class="form-control" >
                            <?php
                                echo('<option selected value='.$maxPrice.'>'.$maxPrice.'</option>');
                                include 'src/Forms.php';
                                echo $maxPriceselect;
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

    <?php
//    $listOfAds = (HomeController::getAllData('ads', $filteredMarka, $minPrice, $maxPrice));
    foreach ($listOfAds as $ad) : ?>
        <div class="single-ad">
            <?php
                $image = $ad['img_filename'];
                $title = $ad['marka'].' '.$ad['model'];
            ?>

            <div class='zdjecie'><img src='http://olczykpazik.eu/public/img/<?php echo $image ?>'></div>
            <div class='info'>
                <div class='marka'><?php echo $title ?></div>
                <div class='rok-produkcji'>Production: <?php echo $ad['rok_produkcji'] ?></div>
                <div class='cena'>Price: <?php echo $ad['cena'] ?> zł</div>
                <div class='user'><p>Added by <?php echo HomeController::getUserNameById($ad['id_user'])?></p></div>
                <div class='phone'><p>Phone number: <?php echo HomeController::getUserNumberById($ad['id_user']) ?></p></div>

<!--                <div class="addcomment">-->
<!--                    <div class="form-group">-->
<!--                        <form action="" method="post">-->
<!--                            <label for="exampleFormControlTextarea1">Comment here...</label>-->
<!--                            <textarea required maxlength="50" name="comment-content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>-->
<!--                            <input name="ad-id" hidden value="--><?php //echo($ad['id']) ?><!--">-->
<!--                            <button type="submit" name="sendComment" class="btn btn-primary">Add</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
<!--        <div class="comments">-->
<!---->
<!--            --><?php
//            $comments = HomeController::getComments($ad['id']);
//            foreach ($comments as $comment) {
//                echo('<p class="comment"> * '.$comment['content'].'</p>');
//            }
//            ?>
<!--        </div>-->

    <?php endforeach; ?>
</div>
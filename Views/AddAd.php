<?php
    if(isset($_POST['submit'])){
        AddAdController::addAdvert();
    }
?>
<div class="new-add">
    <?php
    $loggedIn = (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== '') ? $_SESSION['logged_in'] : false;
    if($loggedIn): ?>
        <h2>Add new advertisement</h2>
        <form action="" method="post" ENCTYPE="multipart/form-data">
            <div class="form-row">
                <div class="col">
                    <select name="marka" class="form-control" required >
                        <option value="" disabled selected hidden>Make</option>
                        <option value="Alfa Romeo">Alfa Romeo</option>
                        <option value="Audi">Audi</option>
                        <option value="BMW">BMW</option>
                        <option value="Citroen">Citroen</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Ford">Ford</option>
                        <option value="Honda">Honda</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Kia">Kia</option>
                        <option value="Lexus">Lexus</option>
                        <option value="Mazda">Mazda</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Mitshubishi">Mitsubishi</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Porsche">Porsche</option>
                        <option value="Renault">Renault</option>
                        <option value="Seat">Seat</option>
                        <option value="Skoda">Skoda</option>
                        <option value="Subaru">Subaru</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Volvo">Volvo</option>
                    </select>
                </div>
                <div class="col">
                    <input name="model" type="text" class="form-control" placeholder="Car model" maxlength="40" pattern=".{1,}"  required title="1 characters minimum">
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <select name="Production" class="form-control" required>
                        <option value="" disabled selected hidden>Rok produkcji</option>
                        <?php
                        for( $x = 2019; $x >= 1950; $x-- )
                            echo ("<option value='$x'>$x</option>");
                        ?>
                    </select>
                </div>
                <div class="col">
                    <input name="cena" type="number" min="0" max="1000000000" pattern=".{1,}"  required title="1 characters minimum" class="form-control" placeholder="Price">
                    <input name="id_user" type="hidden" value="<?php $_SESSION['user_id'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Insert image...</label>
                <input type="file" name="img_filename" accept="image/png, image/jpeg, image/jpg" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Dodaj ogłoszenie</button>
        </form>
    <?php endif; ?>
    <?php if(!$loggedIn): ?>
        <h2 class="notlogged">You are not logged in!</h2>
    <?php endif; ?>

</div>
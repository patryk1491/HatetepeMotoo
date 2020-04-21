<?php
$ad = unserialize(base64_decode($_POST['edit']));
$id = $ad['id'];
$marka = $ad['marka'];
$model = $ad['model'];
$rok_produkcji = $ad['rok_produkcji'];
$cena = $ad['cena'];
$img = $ad['img_filename'];

if(isset($_POST['submit'])){
    EditAdController::editAd();
}
?>
<div class="new-add">
    <h2>Edit your advertisement</h2>
    <form action="" method="post" ENCTYPE="multipart/form-data">
        <div class="form-row">
            <div class="col">
                <select name="marka" class="form-control" required>
                    <option <?php echo($marka) ?>selected="selected"><?php echo($marka) ?></option>
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
                <input name="model" type="text" class="form-control" placeholder="Car model" pattern=".{1,}" maxlength="40"  required title="1 characters minimum" value="<?php echo($model) ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <select class="form-control" name="rok_produkcji" required>
                    <option <?php echo($rok_produkcji) ?>selected="selected"><?php echo($rok_produkcji) ?></option>
                    <?php
                    for( $x = 2019; $x >= 1950; $x-- )
                        echo ("<option value='$x'>$x</option>");
                    ?>
                </select>
            </div>
            <div class="col">
                <input name="cena" type="number" step="1" min="1" class="form-control" placeholder="Price" max="1000000000" pattern=".{1,}"  required title="1 characters minimum" value="<?php echo($cena) ?>">
                <input type="hidden" name="id" value="<?php echo $id ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Insert image...</label>
            <input type="file" name="img_filename" accept="image/png, image/jpeg, image/jpg" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Edit your ad</button>
    </form>
</div>
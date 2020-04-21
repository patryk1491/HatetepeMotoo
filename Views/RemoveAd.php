<?php
    RemoveAdController::removeRowById($_POST['idToRemove']);
    header("location: my-ads");
?>
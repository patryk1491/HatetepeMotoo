<?php

$emailToConfirm = $_GET['email'];
ConfirmEmailController::confirmEmail($emailToConfirm);
header('location: http://olczykpazik.eu/login');
echo('Email confirmed! Please log in now!');
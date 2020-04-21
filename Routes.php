<?php
include_once('classes/Route.php');
include_once('Model/Model.php');
include_once('Model/SessionModel.php');

function autoloader($class) {
    include 'Controllers/' . $class . '.php';
}

spl_autoload_register('autoloader');

Route::set('', function() {
    HomeController::CreateView('Home');
});

Route::set('home', function() {
    HomeController::CreateView('Home');
});

Route::set('add-ad', function() {
    AddAdController::CreateView('AddAd');
});

Route::set('login', function() {
    LoginController::CreateView('Login');
});

Route::set('logout', function() {
    LoginController::CreateView('Logout');
});

Route::set('register', function() {
    RegisterController::CreateView('Register');
});

Route::set('my-ads', function() {
    MyAdsController::CreateView('MyAds');
});

Route::set('remove-ad', function() {
    RemoveAdController::CreateView('RemoveAd');
});

Route::set('edit-ad', function() {
    EditAdController::CreateView('EditAd');
});

Route::set('confirm', function() {
    EditAdController::CreateView('ConfirmEmail');
});
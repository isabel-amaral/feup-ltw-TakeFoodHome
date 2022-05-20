<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/create-new-user.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = sha1($_POST['password']);
    $isOwner = isset($_POST['owner']);
    $isCourier = isset($_POST['courier']);

    addUserToDatabase($db, $username, $name, $email, $phone, $address, $password, $isOwner, $isCourier);
    header('Location: login.php');
?>
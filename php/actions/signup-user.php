<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/add-new-user.php');
    require_once('login.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = sha1($_POST['password']);
    $isOwner = isset($_POST['owner']);
    $isCourier = isset($_POST['courier']);

    echo "\n";
    echo $username;
    echo "\n";
    echo $name;
    echo "\n";
    echo $password;
    echo "\n";

    addUserToDatabase($db, $username, $name, $email, $phone, $address, $password, $isOwner, $isCourier);
    initiateSession($username, $password);
?>
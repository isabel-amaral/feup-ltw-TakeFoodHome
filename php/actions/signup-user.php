<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/insert-new-user.php');
    require_once('login.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $username = preg_replace("/[^a-zA-Z0-9_-\s]/", '', $_POST['username']);
    $name =  preg_replace("/[^a-zA-Z\s]/", '', $_POST['name']);
    $email = preg_replace("/[^a-zA-Z0-9@._-\s]/", '', $_POST['email']);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = sha1($_POST['password']);

    $isOwner = 0; $isCourier = 0;
    foreach ($_POST['user-type'] as $value) {
        if ($value === 'owner')
            $isOwner = 1;
        if ($value === 'courier')
            $isCourier = 1;
    }

    addUserToDatabase($db, $username, $name, $email, $phone, $address, $password, $isOwner, $isCourier);
    initiateSession($username, $password);
?>
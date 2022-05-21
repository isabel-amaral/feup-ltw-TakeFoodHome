<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/update-user-info.php');
    require_once('login.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    session_start();
    updateUserInfo($db, $_SESSION['userID'], $username, $name, $email, $phone, $address);
    updateSessionInfo($username, $name);
?>
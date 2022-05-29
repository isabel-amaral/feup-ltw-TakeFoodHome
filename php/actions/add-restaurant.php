<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/insert-new-restaurant.php');

    session_start();
    $db = getDatabaseConnection('../../database/restaurants.db');
    $user_info = getUserbyID($db, $_SESSION['userID']);
    if ($user_info['isOwner'] === 0) {
        header('Location: ../../user-info-page.php');
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $ownerID = $_SESSION['userID']

    addRestaurantToDatabase($db, $name, $description, $category, $email, $phone, $address, $ownerID);
    header('Location: ../../user-info-page.php');
?>
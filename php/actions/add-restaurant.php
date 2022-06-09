<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/user.php');
    require_once('../../database/data-insertion/insert-new-restaurant.php');

    session_start();
    $db = getDatabaseConnection('../../database/restaurants.db');
    $user_info = getUserbyID($db, $_SESSION['userID']);
    if ($_SESSION['userID'] === NULL) {
        header('Location: ../../register-page.php');
    } else if ($user_info['owner'] === 0) {
        header('Location: ../../user-info-page.php');    
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    addRestaurantToDatabase($db, $name, $description, $category, $email, $phone, $address, $_SESSION['userID']);
    header('Location: ../../user-info-page.php');
?>
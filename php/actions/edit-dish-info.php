<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/user.php');
    require_once('../../database/data-fetching/dishes.php');
    require_once('../../database/data-fetching/restaurants.php'); 
    require_once('../../database/data-insertion/update-dish-info.php');
    require_once('img-insertion.php');

    session_start();
    $db = getDatabaseConnection('../../database/restaurants.db');
    $user_info = getUserbyID($db, $_SESSION['userID']);
    $dishID = preg_replace("/[^0-9\s]/", '', $_GET['dishID']);
    $dish_info = getDishInfo($db, $dishID);
    $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['restaurantID']);
    $restaurant_info = getRestaurantInfo($db, $restaurantID);
    $ownerID = $restaurant_info['ownerID'];

    if ($_SESSION['userID'] === NULL) {
        die(header('Location: ../../register-page.php'));        
    } else if ($user_info['owner'] === 0 || $user_info['userID'] !== $ownerID) {
        die(header('Location: ../../user-info-page.php'));
    }

    $name = preg_replace("/[^a-zA-Z\s]/", '', $_POST['name']);
    $description = preg_replace("/[^a-zA-Z,.?!\s]/", '', $_POST['description']);
    $price = $_POST['price'];
    $category = preg_replace("/[^a-zA-Z\s]/", '', $_POST['category']);
    $picture = $_POST['picture'];

    $picture = insertImage($dish_info);

    updateDishInfo($db, $dishID, $name, $description, $price, $category, $picture);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
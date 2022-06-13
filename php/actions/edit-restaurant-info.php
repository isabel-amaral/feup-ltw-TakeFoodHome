<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/restaurants.php'); 
    require_once('../../database/data-insertion/update-restaurant-info.php');
    require_once('img-insertion-restaurants.php');

    session_start();
    $restaurantID = $_GET['id'];
    $db = getDatabaseConnection('../../database/restaurants.db');
    $current_restaurant_info = getRestaurantInfo($db, $restaurantID);
    if ($current_restaurant_info['ownerID'] !== $_SESSION['userID']) {
        header('Location: restaurant-page.php?id=' . $restaurantID);
    }   

    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $picture = insertImageRestaurant($current_restaurant_info);

    updateRestaurantInfo($db, $restaurantID, $name, $description, $category, $email, $phone, $address,$picture);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
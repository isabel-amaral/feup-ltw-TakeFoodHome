<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/user.php');
    require_once('../../database/data-insertion/insert-new-restaurant.php');
    require_once('../../database/data-fetching/restaurants.php');
    require_once('../../database/data-insertion/update-restaurant-info.php');
    require_once('img-insertion-restaurants.php');

    session_start();
    $db = getDatabaseConnection('../../database/restaurants.db');
    $user_info = getUserbyID($db, $_SESSION['userID']);
    if ($_SESSION['userID'] === NULL) {
        die(header('Location: ../../register-page.php'));
    } else if ($user_info['owner'] === 0) {
        die(header('Location: ../../user-info-page.php'));    
    }

    $name = preg_replace("/[^a-zA-Z\s]/", '', $_POST['name']);
    $description = preg_replace("/[^a-zA-Z,.?!\s]/", '', $_POST['description']);
    $category = preg_replace("/[^a-zA-Z\s]/", '', $_POST['category']);
    $email = preg_replace("/[^a-zA-Z0-9@._\s]/", '', $_POST['email']);
    $phone = $_POST['phone'];
    $address = preg_replace("/[^a-zA-Z0-9\s]/", '', $_POST['address']);
    $picture = "picture1";

    addRestaurantToDatabase($db, $name, $description, $category, $email, $phone, $address, $_SESSION['userID'], $picture);
    $restaurantID = count(getAllRestaurants($db));
    $restaurant_info = getRestaurantInfo($db, $restaurantID);
    $picture = insertImageRestaurant($restaurant_info);
    updateRestaurantInfo($db, $restaurantID, $name, $description, $category, $email, $phone, $address, $picture);

    header('Location: ../../user-info-page.php');
?>
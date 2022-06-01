<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/user.php');
    require_once('../../database/data-fetching/restaurants.php');
    require_once('../../database/data-insertion/insert-new-dish.php');
    
    $db = getDatabaseConnection('../../database/restaurants.db');
    $user_info = getUserbyID($db, $_SESSION['userID']);
    $restaurant_info = getRestaurantInfo($db, $_GET['restaurantID']);
    $ownerID = $restaurant_info['ownerID'];

    if ($_SESSION['userID'] === NULL) {
        header('Location: ../../register-page.php');        
    } else if ($user_info['owner'] === 0 || $user_info['userID'] !== $ownerID) {
        header('Location: ../../user-info-page.php');
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $picture = $_POST['picture'];
    $restaurantID = $_GET['restaurantID'];

    echo $picture;

    addDishToDatabase($db, $name, $description, $price, $picture, $category, $restaurantID);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
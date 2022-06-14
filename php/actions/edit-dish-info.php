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
    $picture = $_FILES['picture']['name'];

    if($name == ""){
        $_SESSION['errors']= "name can´t be empty";
        header('Location: ../../dish-info-edit-page.php?restaurantID='.$_GET['restaurantID'].'&dishID='.$_GET['dishID']);
        return;
    } 
    if($description == ""){
        $_SESSION['errors']= "description can´t be empty";
        header('Location: ../../dish-info-edit-page.php?restaurantID='.$_GET['restaurantID'].'&dishID='.$_GET['dishID']);
        return;
    } 
    if($category == ""){
        $_SESSION['errors']= "category can´t be empty";
        header('Location: ../../dish-info-edit-page.php?restaurantID='.$_GET['restaurantID'].'&dishID='.$_GET['dishID']);
        return;
    } 
    if($price == ""){
        $_SESSION['errors']= "price can´t be empty";
        header('Location: ../../dish-info-edit-page.php?restaurantID='.$_GET['restaurantID'].'&dishID='.$_GET['dishID']);
        return;
    } 
    if($picture == ""){
        $_SESSION['errors']= "picture can´t be empty";
        header('Location: ../../dish-info-edit-page.php?restaurantID='.$_GET['restaurantID'].'&dishID='.$_GET['dishID']);
        return;
    } 

    $picture = insertImage($dish_info);

    updateDishInfo($db, $dishID, $name, $description, $price, $category, $picture);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
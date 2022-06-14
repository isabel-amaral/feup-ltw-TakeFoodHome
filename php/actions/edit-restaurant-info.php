<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/restaurants.php'); 
    require_once('../../database/data-insertion/update-restaurant-info.php');
    require_once('img-insertion-restaurants.php');

    session_start();
    $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['id']);
    $db = getDatabaseConnection('../../database/restaurants.db');
    $current_restaurant_info = getRestaurantInfo($db, $restaurantID);
    if ($current_restaurant_info['ownerID'] !== $_SESSION['userID']) {
        die(header('Location: restaurant-page.php?id=' . $restaurantID));
    }   

    $name = preg_replace("/[^a-zA-Z\s]/", '', $_POST['name']);
    $description = preg_replace("/[^a-zA-Z,.?!\s]/", '', $_POST['description']);
    $category = preg_replace("/[^a-zA-Z\s]/", '', $_POST['category']);
    $email = preg_replace("/[^a-zA-Z0-9@._\s]/", '', $_POST['email']);
    $phone = $_POST['phone'];
    $address = preg_replace("/[^a-zA-Z0-9\s]/", '', $_POST['address']);
    $picture = $_FILES['picture']['name'];

    if($picture == ""){
        $_SESSION['errors']= "picture can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 
    
    $picture = insertImageRestaurant($current_restaurant_info);

    if($name == ""){
        $_SESSION['errors']= "name can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 
    if($description == ""){
        $_SESSION['errors']= "description can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 
    if($category == ""){
        $_SESSION['errors']= "category can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 
    if($email == ""){
        $_SESSION['errors']= "email can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 
    if($phone == ""){
        $_SESSION['errors']= "phone can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 
    if($address == ""){
        $_SESSION['errors']= "address can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 
    if($picture == ""){
        $_SESSION['errors']= "picture can´t be empty";
        header('Location: ../../restaurant-info-edit-page.php?id='.$restaurantID);
        return;
    } 

    updateRestaurantInfo($db, $restaurantID, $name, $description, $category, $email, $phone, $address,$picture);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
<?php
    require_once('../db-connection.php');
    require_once('restaurants.php');
    
    $db = getDatabaseConnection('../restaurants.db');
    $restaurants = searchRestaurants($db, $_GET['search'] . '%');
    echo json_encode($restaurants);
?>
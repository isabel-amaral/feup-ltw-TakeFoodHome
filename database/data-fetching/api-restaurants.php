<?php
    require_once('../db-connection.php');
    require_once('restaurants.php');
    
    $db = getDatabaseConnection('../restaurants.db');
    $search = preg_replace("/[^a-zA-Z\s]/", '', $_GET['search']);
    $restaurants = searchRestaurants($db, $search . '%');
    echo json_encode($restaurants);
?>
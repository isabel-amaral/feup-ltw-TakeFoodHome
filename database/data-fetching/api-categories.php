<?php
    require_once('../db-connection.php');
    require_once('restaurants.php');
    
    $db = getDatabaseConnection('../restaurants.db');
    $restaurants = searchByCategory($db, $_GET['category']);
    echo json_encode($restaurants);    
?>
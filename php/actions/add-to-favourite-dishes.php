<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/update-favourite-status.php');

    session_start();
    if ($_SESSION['userID'] === NULL)
        die(header('Location: ../../register-page.php'));

    $db = getDatabaseConnection('../../database/restaurants.db');
    $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['restaurantID']);
    $dishID = preg_replace("/[^0-9\s]/", '', $_GET['dishID']);
    addToFavouriteDishes($db, $_SESSION['userID'], $dishID);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
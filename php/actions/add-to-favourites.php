<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/insert-favourite.php');

    session_start();
    if ($_SESSION['userID'] === NULL)
        die(header('Location: ../../register-page.php'));

    $db = getDatabaseConnection('../../database/restaurants.db');
    addToFavourties($db, $_SESSION['userID'], $_GET['restaurantID']);
    header('Location: ../../restaurant-page.php?id=' . $_GET['restaurantID']);
?>
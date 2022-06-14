<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/restaurants.php');
    require_once('../../database/data-insertion/insert-new-comment.php');

    session_start();
    if ($_SESSION['userID'] === NULL)
        die(header('Location: ../../register-page.php'));
    $db = getDatabaseConnection('../../database/restaurants.db');
    $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['restaurantID']);
    $restaurant_info = getRestaurantInfo($db, $restaurantID);
    $ownerID = $restaurant_info['ownerID'];
    if ($ownerID !== $_SESSION['userID'])
        die(header('Location: ../../restaurant-page.php?id=' . $restaurantID));

    $comment = preg_replace("/[^a-zA-Z09,.?!\s]/", '', $_POST['response']);
    $date = date('Y-m-d');
    $reviewID = preg_replace("/[^0-9\s]/", '', $_GET['reviewID']);
    $ownerID = $_SESSION['userID'];

    addResponseToDatabase($db, $comment, $date, $reviewID, $ownerID);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
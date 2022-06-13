<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/restaurants.php');
    require_once('../../database/data-fetching/user-orders.php');
    require_once('../../database/data-insertion/insert-new-comment.php');

    session_start();
    if ($_SESSION['userID'] === NULL)
        die(header('Location: ../../register-page.php'));
    $db = getDatabaseConnection('../../database/restaurants.db');
    $restaurantID = $_GET['restaurantID'];
    $restaurant_info = getRestaurantInfo($db, $restaurantID);
    $ownerID = $restaurant_info['ownerID'];
    if (!checkIfOrderExists($db, $restaurantID) || $ownerID !=== $_SESSION['userID'])
        die(header('Location: ../../restaurant-page.php?id=' . $restaurantID));

    $comment = $_POST['comment'];
    $date = date('Y-m-d');
    $customerID = $_SESSION['userID'];

    addCommentToDatabase($db, $comment, $date, $customerID, $restaurantID);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
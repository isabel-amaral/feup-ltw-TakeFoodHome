<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/restaurants.php');
    require_once('../../database/data-fetching/user-orders.php');
    require_once('../../database/data-insertion/insert-new-comment.php');

    session_start();
    $_SESSION['errors'] = "";
    if ($_SESSION['userID'] === NULL)
        die(header('Location: ../../register-page.php'));
    $db = getDatabaseConnection('../../database/restaurants.db');
    $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['restaurantID']);
    $restaurant_info = getRestaurantInfo($db, $restaurantID);
    $ownerID = $restaurant_info['ownerID'];
    if (!checkIfOrderExists($db, $_SESSION['userID'], $restaurantID) || $ownerID === $_SESSION['userID'])
        die(header('Location: ../../restaurant-page.php?id=' . $restaurantID));

    $comment = preg_replace("/[^a-zA-Z0-9,.?!\s]/", '', $_POST['comment']);
    $date = date('Y-m-d');
    $customerID = $_SESSION['userID'];

    if (empty($comment) ||  empty($customerID)){
        $_SESSION['errors'] = ("Comment can't be empty");
        header('Location: ../../restaurant-page.php?id=' . $restaurantID);
        return;
    }

    addCommentToDatabase($db, $comment, $date, $customerID, $restaurantID);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
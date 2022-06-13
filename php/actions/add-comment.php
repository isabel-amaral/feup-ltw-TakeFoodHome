<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/restaurants.php');
    require_once('../../database/data-fetching/user-orders.php');
    require_once('../../database/data-insertion/insert-new-comment.php');

    session_start();
    if ($_SESSION['userID'] === NULL)
        die(header('Location: ../../register-page.php'));
    $db = getDatabaseConnection('../../database/restaurants.db');
    if (!checkIfOrderExists($db, $_GET['restaurantID']))
        die(header('Location: ../../restaurant-page.php?id=' . $_GET['restaurantID']));

    $comment = $_POST['comment'];
    $date = date('Y-m-d');
    $customerID = $_SESSION['userID'];
    $restaurantID = $_GET['restaurantID'];

    addCommentToDatabase($db, $comment, $date, $customerID, $restaurantID);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
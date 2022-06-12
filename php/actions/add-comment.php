<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/insert-new-comment.php');

    session_start();
    $db = getDatabaseConnection('../../database/restaurants.db');

    $comment = $_POST['comment'];
    $date = date('Y-m-d');
    $customerID = $_SESSION['userID'];
    $restaurantID = $_GET['restaurantID'];

    addCommentToDatabase($db, $comment, $date, $customerID, $restaurantID);
    header('Location: ../../restaurant-page.php?id=' . $restaurantID);
?>
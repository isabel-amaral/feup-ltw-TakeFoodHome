<?php
  require_once('../../database/db-connection.php');
  require_once('../../database/data-fetching/user.php');
  require_once('../../database/data-fetching/restaurants.php');
  require_once('../../database/data-insertion/update-order-info.php');

  session_start();
  $db = getDatabaseConnection('../../database/restaurants.db');
  $user_info = getUserbyID($db, $_SESSION['userID']);
  $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['restaurantID']);
  $restaurant_info = getRestaurantInfo($db, $restaurantID);
  $ownerID = $restaurant_info['ownerID'];

  if ($_SESSION['userID'] === NULL) {
    header('Location: ../../register-page.php');        
  } else if ($user_info['owner'] === 0 || $user_info['userID'] !== $ownerID) {
    header('Location: ../../restaurant-orders-page.php');
  }

  $orderID = preg_replace("/[^0-9\s]/", '', $_GET['orderID']);
  $state = preg_replace("/[^a-zA-Z\s]/", '', $_GET['state']);
  updateRestaurantInfo($db, $orderID, $state);
  header('Location: ../../restaurant-orders-page.php?restaurantID=' . $restaurantID);
?>
<?php
  require_once('../../database/db-connection.php');
  require_once('../../database/data-fetching/user.php');
  require_once('../../database/data-fetching/restaurants.php');
  require_once('../../database/data-insertion/update-order-info.php');

  session_start();
  $db = getDatabaseConnection('../../database/restaurants.db');
  $user_info = getUserbyID($db, $_SESSION['userID']);
  $restaurant_info = getRestaurantInfo($db, $_GET['restaurantID']);
  $ownerID = $restaurant_info['ownerID'];

  if ($_SESSION['userID'] === NULL) {
    header('Location: ../../register-page.php');        
  } else if ($user_info['owner'] === 0 || $user_info['userID'] !== $ownerID) {
    header('Location: ../../restaurant-orders-page.php');
  }

  updateRestaurantInfo($db, $_GET['orderID'], $_GET['state']);
  header('Location: ../../restaurant-orders-page.php?restaurantID=' . $_GET['restaurantID']);

?>
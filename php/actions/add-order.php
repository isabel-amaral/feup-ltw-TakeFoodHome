<?php 
  session_start();
  require_once('../../database/db-connection.php');
  require_once('../../database/data-insertion/insert-new-order.php');
  require_once('../../database/data-fetching/order.php');

  $db = getDatabaseConnection('../../database/restaurants.db');

  $restaurantID = $_POST["restaurantID"];

  if ($_SESSION['userID'] === NULL) {
    header('Location: ../../register-page.php');        
  }
  $date = "2022-05-05";

  addOrderToDatabase($db,"2022-05-05",$restaurantID,$_POST["userID"]);
  $orderids = getOrder($db);
  addDishFoodOrder($db,count($orderids),$foodList);
  header('Location: ../../restaurant-page.php?id=1' );
?>
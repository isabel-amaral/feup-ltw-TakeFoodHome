<?php 
  session_start();
  require_once('../../database/db-connection.php');
  require_once('../../database/data-insertion/insert-new-order.php');

  $db = getDatabaseConnection('../../database/restaurants.db');

  $restaurantID = $_POST["restaurantID"];
  var_dump($restaurantID);

  if ($_SESSION['userID'] === NULL) {
    header('Location: ../../register-page.php');        
  }

  addOrderToDatabase($db,"2022-05-05",$restaurantID,$_POST["userID"]);
  //header('Location: ../../restaurant-page.php?id=1' );
?>
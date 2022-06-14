<?php 

  session_start();
  require_once('../../database/db-connection.php');
  require_once('../../database/data-insertion/insert-new-order.php');
  require_once('../../database/data-fetching/order.php');

  $db = getDatabaseConnection('../../database/restaurants.db');

  if ($_SESSION['userID'] === NULL) {
    header('Location: ../../register-page.php');        
  }

  $foodArray = explode(' ',$_POST['foodList']);
  $foodNumArray = explode(' ',$_POST['foodListNum']);
  $currentDate = new DateTime();

  addOrderToDatabase($db,$currentDate->format('Y-m-d'),$_POST["restaurantID"],$_POST["userID"]);
  $orderids = getOrder($db);
  $orderID =count($orderids);
  for($i = 2; $i< count($foodArray);$i++){
    for ($j = 0;$j< $foodNumArray[$i];$j++){
      addDishFoodOrder($db,$orderID,$foodArray[$i]);
    }
  }

  
  header('Location: ../../restaurant-page.php?id=1' );
  
?>
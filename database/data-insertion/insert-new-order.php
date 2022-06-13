<?php
    function addOrderToDatabase($db,$date, $restaurantID,$customerID) {
      $stmt = $db->prepare(
        'INSERT INTO FoodOrder (date,restaurantID,customerID) VALUES(
          :dates,
          :restaurantID,
          :customerID
        );'
      );
      $stmt->bindParam(':dates', $date);
      $stmt->bindParam(':restaurantID', $restaurantID);
      $stmt->bindParam(':customerID', $customerID);

      $stmt->execute();
        
    }

    function addDishFoodOrder($db,$orderID,$foodID){
        $stmt = $db->prepare(
          'INSERT INTO DishFoodOrder (dishID,orderID) VALUES(
            :dishID,
            :orderID
          );'
        );
        $stmt->bindParam(':dishID',$foodID);
        $stmt->bindParam(':orderID', $orderID);
        $stmt->execute();
    }
?>
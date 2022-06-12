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

    function addDishFoodOrder($db,$orderID,$foodList){
      foreach ($foodList as $food){
        $stmt = $db->prepare(
          'INSERT INTO DishFoorOrder VALUES(
            :dishID,
            :orderID
          );'
        );
        $stmt->bindParam(':dishID',$food);
      $stmt->bindParam(':orderID', $orderID);
      }
      

    }
?>
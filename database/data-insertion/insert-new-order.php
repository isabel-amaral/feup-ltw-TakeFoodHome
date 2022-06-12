<?php
    function addOrderToDatabase($db,$date, $restaurantID,$custumerID) {
      $stmt = $db->prepare(
        'INSERT INTO FoodOrder (date,restaurantID,customerID) VALUES(
          :date,
          :restaurantID,
          :customerID
        );'
      );
      $stmt->bindParam(':date', $date);
      $stmt->bindParam(':restaurantID', 1);
      $stmt->bindParam(':customerID', 1);

      $stmt->execute();
        
    }
?>
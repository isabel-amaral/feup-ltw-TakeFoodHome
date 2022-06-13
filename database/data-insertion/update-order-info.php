<?php
    function updateRestaurantInfo($db,$orderID,$state) {
        $stmt = $db->prepare(
            'UPDATE FoodOrder
            SET state = :state
            WHERE orderID = :id'
        );
        $stmt->bindParam(':id', $orderID);
        $stmt->bindParam(':state', $state);

        $stmt->execute();
    }
?>
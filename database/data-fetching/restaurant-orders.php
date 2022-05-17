<?php
    function getRestaurantOrders($db, $restaurant_id) {
        $stmt = $db->prepare(
            'SELECT * FROM FoodOrder
            WHERE restaurantID = :id'
        );
        $stmt->bindParam(':id', $restaurant_id);
        $stmt->execute();
        $orders = $stmt->fetchAll();
        return $orders;
    }
?>
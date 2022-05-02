<?php
    function getRestaurantInfo($db, $restaurant_id) {
        $stmt = $db->prepare(
            'SELECT *
            FROM Restaurant
            WHERE restaurantID = :id'
        );
        $stmt->bindParam(':id', $restaurant_id);
        $stmt->execute();
        $restaurant_info = $stmt->fetch();
        return $restaurant_info;
    }
?>
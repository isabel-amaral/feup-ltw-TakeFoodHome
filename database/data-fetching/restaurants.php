<?php
    function getAllRestaurants($db) {
        $stmt = $db->prepare(
            'SELECT * FROM Restaurant'
        );
        $stmt->execute();
        $restaurants = $stmt->fetchAll();
        return $restaurants;
    }

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
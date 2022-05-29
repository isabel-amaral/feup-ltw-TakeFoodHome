<?php
    function getAllRestaurants($db) {
        $stmt = $db->prepare(
            'SELECT * FROM Restaurant
            ORDER BY name'
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

    function getRestaurantbyOwner($db,$onwer_id){
        $stmt = $db->prepare(
            'SELECT *
            FROM Restaurant
            WHERE ownerID = :id
            ORDER BY name'
        );
        $stmt ->bindParam(':id',$onwer_id);
        $stmt->execute();
        $restaurants = $stmt->fetchall();
        return $restaurants;
    }
?>
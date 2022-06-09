<?php
    function getRestaurantDishes($db, $restaurant_id) {
        $stmt = $db->prepare(
            'SELECT *
            FROM Dish
            WHERE restaurantID = :id
            ORDER BY category, name'
        );
        $stmt->bindParam(':id', $restaurant_id);
        $stmt->execute();
        $dishes = $stmt->fetchAll();
        return $dishes;
    }

    function getDishInfo($db, $dishID) {
        $stmt = $db->prepare(
            'SELECT * FROM Dish
            WHERE dishID = :id'
        );
        $stmt->bindParam(':id', $dishID);
        $stmt->execute();
        $dish = $stmt->fetch();
        return $dish;
    }
?>
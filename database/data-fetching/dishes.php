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

    function getDishsByOrder($db, $orderid){
        $stmt = $db ->prepare(
            'SELECT dishID FROM DishFoodOrder
            WHERE orderID = :id'
        );
        $stmt->bindParam(':id' , $orderid);
        $stmt->execute();
        $dishes = $stmt->fetchAll();
        return $dishes;
    }

    function getDishes($db){
        $stmt = $db ->prepare(
            'SELECT dishID FROM Dish'
        );
        $stmt->execute();
        $dishes = $stmt->fetchAll();
        return $dishes;
    }
?>
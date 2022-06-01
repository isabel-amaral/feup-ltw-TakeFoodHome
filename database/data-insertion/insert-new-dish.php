<?php
    function addDishToDatabase($db, $name, $description, $price, $picture, $category, $restaurantID) {
        $stmt = $db->prepare(
            'INSERT INTO Dish (name, description, price, picture, category, restaurantID) Values(
                :name,
                :description,
                :price,
                :picture,
                :category,
                :restaurantID
            )'
        );
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':restaurantID', $restaurantID);

        $stmt->execute();
    }
?>
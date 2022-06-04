<?php
    function updateDishInfo($db, $dishID, $name, $description, $price, $category, $picture) {
        $stmt = $db->prepare(
            'UPDATE Dish
            SET name = :name, description = :description,
                price = :price, category = :category,
                picture = :picture
            WHERE dishID = :id'
        );
        $stmt->bindParam(':id', $dishID);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':picture', $picture);

        $stmt->execute();
    }
?>
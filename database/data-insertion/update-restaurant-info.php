<?php
    function updateRestaurantInfo($db, $restaurantID, $name, $description, $category, $email, $phone, $address) {
        $stmt = $db->prepare(
            'UPDATE Restaurant
            SET name = :name, description = :description,
                category = :category, email = :email, 
                phoneNumber = :phone, address = :address
            WHERE restaurantID = :id'
        );
        $stmt->bindParam(':id', $restaurantID);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);

        $stmt->execute();
    }
?>
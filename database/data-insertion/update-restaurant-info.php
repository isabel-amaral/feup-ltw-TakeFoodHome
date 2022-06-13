<?php
    function updateRestaurantInfo($db, $restaurantID, $name, $description, $category, $email, $phone, $address,$picture) {
        $stmt = $db->prepare(
            'UPDATE Restaurant
            SET name = :name, description = :description,
                category = :category, email = :email, 
                phoneNumber = :phone, address = :address, picture = :picture
            WHERE restaurantID = :id'
        );
        $stmt->bindParam(':id', $restaurantID);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':picture',$picture);

        $stmt->execute();
    }
?>
<?php
    function addRestaurantToDatabase($db, $name, $description, $category, $email, $phone, $address, $ownerID) {;
        $stmt = $db->prepare(
            'INSERT INTO Restaurant (name, description, category, email, phoneNumber, address, ownerID) Values(
                :name,
                :description,
                :category,
                :email,
                :phone,
                :address,
                :ownerID
            )'
        );
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':ownerID', $ownerID);

        $stmt->execute();
    }
?>
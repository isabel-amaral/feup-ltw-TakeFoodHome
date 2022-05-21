<?php
    function updateUserInfo($db, $userID, $username, $name, $email, $phone, $address) {
        $stmt = $db->prepare(
            'UPDATE User
            SET username = :username, name = :name,
                email = :email, phoneNumber = :phone,
                address = :address
            WHERE userID = :id'
        );
        $stmt->bindParam(':id', $userID);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);

        $stmt->execute();
    }
?>
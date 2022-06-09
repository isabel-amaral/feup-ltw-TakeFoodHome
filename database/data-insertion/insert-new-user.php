<?php
    function addUserToDatabase($db, $username, $name, $email, $phone, $address, $password, $isOwner, $isCourier) {
        $stmt = $db->prepare(
            'INSERT INTO User (username, name, email, phoneNumber, address, password, owner, courier) Values(
                :username,
                :name,
                :email,
                :phone,
                :address,
                :password,
                :owner,
                :courier
            )'
        );
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':owner', $isOwner);
        $stmt->bindParam('courier', $isCourier);

        $stmt->execute();
    }
?>
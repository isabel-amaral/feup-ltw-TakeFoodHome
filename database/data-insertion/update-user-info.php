<?php
    function updateUserInfo($db, $username, $name, $email, $phone, $address) {
        $stmt = $db->prepare(
            
        );
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);

        $stmt->execute();
    }
?>
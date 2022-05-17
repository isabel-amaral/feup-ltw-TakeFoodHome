<?php
    function getUser($db, $username, $password) {
        echo $username;
        echo $password;
        $stmt = $db->prepare(
            'SELECT * FROM User
            WHERE username = :username
            AND password = :password'
        );
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }
?>
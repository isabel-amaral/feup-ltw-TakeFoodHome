<?php
    function getUser($db, $username) {
        $stmt = $db->prepare(
            'SELECT * FROM User
            WHERE username = :username'
        );
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

    function getUserbyID($db, $id) {
        $stmt = $db->prepare(
            'SELECT * FROM User
            WHERE userID = :id'
        );
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $user =$stmt->fetch();
        return $user;
    }
?>
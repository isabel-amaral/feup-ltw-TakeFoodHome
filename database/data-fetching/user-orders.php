<?php
    function getUserOrders($db) {
        session_start();
        $id = $_SESSION['userID'];
    
        $stmt = $db->prepare(
            'SELECT * FROM FoodOrder
            WHERE customerID = :id'
        );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $orders = $stmt->fetchAll();
        return $orders;
    }

    function checkIfOrderExists($db, $userID, $restaurantID) {
        $stmt = $db->prepare(
            'SELECT * FROM FoodOrder
            WHERE customerID = :customerID
            AND restaurantID = :restaurantID'
        );
        $stmt->bindParam(':customerID', $userID);
        $stmt->bindParam(':restaurantID', $restaurantID);
        $stmt->execute();
        $orders = $stmt->fetchAll();

        if (sizeof($orders) === 0)
            return false;
        return true;
    }
?>
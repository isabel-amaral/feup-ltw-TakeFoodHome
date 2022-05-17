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
?>
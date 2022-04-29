<?php
    function getAllRestaurants($db) {
        $stmt = $db->prepare(
            'SELECT * FROM Restaurants'
        );
        $stmt->execute();
        $restaurants = $stmt->fetchAll();
        return $restaurants;
    }
?>
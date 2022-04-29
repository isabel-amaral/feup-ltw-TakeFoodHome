<?php
    function getAllRestaurants($db) {
        $stmt = $db->prepare(
            'SELECT * FROM Restaurant'
        );
        $stmt->execute();
        $restaurants = $stmt->fetchAll();
        return $restaurants;
    }
?>
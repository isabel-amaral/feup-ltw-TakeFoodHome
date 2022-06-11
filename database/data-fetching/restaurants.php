<?php
    function getAllRestaurants($db) {
        $stmt = $db->prepare(
            'SELECT * FROM Restaurant
            ORDER BY name'
        );
        $stmt->execute();
        $restaurants = $stmt->fetchAll();
        return $restaurants;
    }

    function searchRestaurants($db, $search) {
        $stmt = $db->prepare(
            'SELECT * FROM Restaurant
            WHERE name LIKE :name'
        );
        $stmt->bindParam(':name', $search);
        $stmt->execute();
        $restaurants = $stmt->fetchAll();
        return $restaurants;
    }

    function getAllCategories($db) {
        $stmt = $db->prepare(
            'SELECT DISTINCT category 
            From Restaurant
            Order by category'
        );
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }

    function searchByCategory($db, $category) {
        $stmt;
        if ($category === 'all') {
            $stmt = $db->prepare(
                'SELECT * FROM Restaurant'
            );
        } else {
            $stmt = $db->prepare(
                'SELECT * FROM Restaurant
                WHERE category = :category'
            );
            $stmt->bindParam(':category', $category);
        }
        $stmt->execute();
        $restaurants = $stmt->fetchAll();
        return $restaurants;
    }

    function getRestaurantInfo($db, $restaurant_id) {
        $stmt = $db->prepare(
            'SELECT *
            FROM Restaurant
            WHERE restaurantID = :id'
        );
        $stmt->bindParam(':id', $restaurant_id);
        $stmt->execute();
        $restaurant_info = $stmt->fetch();
        return $restaurant_info;
    }

    function getRestaurantbyOwner($db,$onwer_id){
        $stmt = $db->prepare(
            'SELECT *
            FROM Restaurant
            WHERE ownerID = :id
            ORDER BY name'
        );
        $stmt ->bindParam(':id',$onwer_id);
        $stmt->execute();
        $restaurants = $stmt->fetchall();
        return $restaurants;
    }
?>
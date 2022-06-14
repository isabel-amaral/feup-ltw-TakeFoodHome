<?php
    function getAllFavouriteRestaurants($db, $userID) {
        $stmt = $db->prepare(
            'SELECT Restaurant.restaurantID, name
            FROM FavouriteRestaurant JOIN Restaurant ON FavouriteRestaurant.restaurantID = Restaurant.restaurantID
            WHERE userID = :userID
            ORDER BY name'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        $favourites = $stmt->fetchAll();
        return $favourites;
    }

    function checkIfFavouriteRestaurant($db, $userID, $restaurantID) {
        $stmt = $db->prepare(
            'SELECT * FROM FavouriteRestaurant
            WHERE userID = :userID
            AND restaurantID = :restaurantID'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':restaurantID', $restaurantID);
        $stmt->execute();
        $favourites = $stmt->fetchAll();

        if (sizeof($favourites) === 0)
            return false;
        return true;
    }

    function getAllFavouriteDishes($db, $userID) {
        $stmt = $db->prepare(
            'SELECT Dish.dishID, name, restaurantID
            FROM FavouriteDish JOIN Dish ON FavouriteDish.dishID = Dish.dishID
            WHERE userID = :userID
            ORDER BY name'            
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        $favourites = $stmt->fetchAll();
        return $favourites;
    }

    function checkIfFavouriteDish($db, $userID, $dishID) {
        $stmt = $db->prepare(
            'SELECT * FROM FavouriteDish
            WHERE userID = :userID
            AND dishID = :dishID'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':dishID', $dishID);
        $stmt->execute();
        $favourites = $stmt->fetchAll();

        if (sizeof($favourites) === 0)
            return false;
        return true;        
    }
?>
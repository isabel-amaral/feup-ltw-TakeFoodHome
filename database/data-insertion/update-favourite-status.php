<?php
    function addToFavouriteRestaurants($db, $userID, $restaurantID) {
        $stmt = $db->prepare(
            'INSERT INTO FavouriteRestaurant VALUES(
                :userID,
                :restaurantID
            )'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':restaurantID', $restaurantID);
        $stmt->execute();
    }

    function removeFromFavouriteRestaurants($db, $userID, $restaurantID) {
        $stmt = $db->prepare(
            'DELETE FROM FavouriteRestaurant
            WHERE userID = :userID
            AND restaurantID = :restaurantID'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':restaurantID', $restaurantID);
        $stmt->execute();
    }

    function addToFavouriteDishes($db, $userID, $dishID) {
        $stmt = $db->prepare(
            'INSERT INTO FavouriteDish VALUES(
                :userID,
                :dishID
            )'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':dishID', $dishID);
        $stmt->execute();
    }

    function removeFromFavouriteDishes($db, $userID, $dishID) {
        $stmt = $db->prepare(
            'DELETE FROM FavouriteDish
            WHERE userID = :userID
            AND dishID = :dishID'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':dishID', $dishID);
        $stmt->execute();
    }
?>
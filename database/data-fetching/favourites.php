<?php
    function getAllFavourites($db, $userID) {
        $stmt = $db->prepare(
            'SELECT Restaurant.restaurantID, name
            FROM Favourite JOIN Restaurant ON Favourite.restaurantID = Restaurant.restaurantID
            WHERE userID = :userID
            ORDER BY name'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        $favourites = $stmt->fetchAll();
        return $favourites;
    }

    function checkIfFavourite($db, $userID, $restaurantID) {
        $stmt = $db->prepare(
            'SELECT * FROM Favourite
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
?>
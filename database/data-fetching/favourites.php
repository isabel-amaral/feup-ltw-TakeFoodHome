<?php
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
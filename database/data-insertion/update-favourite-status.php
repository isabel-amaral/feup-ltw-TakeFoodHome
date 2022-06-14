<?php
    function addToFavourties($db, $userID, $restaurantID) {
        $stmt = $db->prepare(
            'INSERT INTO Favourite VALUES(
                :userID,
                :restaurantID
            )'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':restaurantID', $restaurantID);
        $stmt->execute();
    }

    function removeFromFavourites($db, $userID, $restaurantID) {
        $stmt = $db->prepare(
            'DELETE FROM Favourite
            WHERE userID = :userID
            AND restaurantID = :restaurantID'
        );
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':restaurantID', $restaurantID);
        $stmt->execute();
    }
?>
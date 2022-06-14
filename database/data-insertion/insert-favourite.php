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
?>
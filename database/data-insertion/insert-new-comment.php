<?php
    function addCommentToDatabase($db, $comment, $date, $custommerID, $restaurantID) {
        $stmt = $db->prepare(
            'INSERT INTO Review (comment, date, customerID, restaurantID) VALUES (
                :comment,
                :date,
                :customerID,
                :restaurantID
            )'
        );
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':customerID', $custommerID);
        $stmt->bindParam(':restaurantID', $restaurantID);

        $stmt->execute();
    }
?>
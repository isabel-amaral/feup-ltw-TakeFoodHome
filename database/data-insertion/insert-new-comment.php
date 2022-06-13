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

    function addResponseToDatabase($db, $comment, $date, $reviewID, $ownerID) {
        $stmt = $db->prepare(
            'INSERT INTO ReviewResponse (comment, date, reviewID, ownerID) VALUES (
                :comment,
                :date,
                :reviewID,
                :ownerID
            )'
        );
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':reviewID', $reviewID);
        $stmt->bindParam(':ownerID', $ownerID);

        $stmt->execute();
    }
?>
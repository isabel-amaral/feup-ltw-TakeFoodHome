<?php
    function getRestaurantReviews($db, $restaurant_id) {
        $stmt = $db->prepare(
            'SELECT Review.*, User.name
            FROM Review JOIN User ON Review.customerID = User.userID
            WHERE restaurantID = :id
            -- TODO: add more inserts to see if order is right
            ORDER BY date'
        );
        $stmt->bindParam(':id', $restaurant_id);
        $stmt->execute();
        $reviews = $stmt->fetchAll();
        return $reviews;
    }

    function getReviewResponses($db, $review_id) {
        $stmt = $db->prepare(
            'SELECT ReviewResponse.*
            FROM ReviewResponse, Review
            WHERE ReviewResponse.reviewID = Review.reviewID 
                AND Review.reviewID = :id
            ORDER BY date'
        );
        $stmt->bindParam(':id', $review_id);
        $stmt->execute();
        $responses = $stmt->fetchAll();
        return $responses;
    }
?>
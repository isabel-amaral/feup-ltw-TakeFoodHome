<?php
    function output_reviews() { 
        require_once('database/db-connection.php');
        require_once('database/reviews.php');
        $db = getDatabaseConnection();
        $reviews = getRestaurantReviews($db, $_GET['id']); ?>
        
        <section id="reviews">
            <h3><?=count($reviews)?> Reviews:</h3>

            <?php
            foreach ($reviews as $review) { ?>
                <article class="review">
                    <header><h4>
                        <span class="user"><?=$review['name']?></span>
                        <span class="date"><?=$review['date']?></span>
                    </h4></header>
                    <p><?=$review['comment']?></p>

                    <?php
                    $responses = getReviewResponses($db, $review['reviewID']);
                    ?>
                    <section class="review-responses">
                    <header><h3><?=count($responses)?> Responses:</h3></header>
                    <?php
                    foreach ($responses as $response) { ?>
                        <article class="review-response">
                            <h4><span class="date"><?=$response['date']?></span></h4>
                            <p><?=$response['comment']?></p>
                        </article>
                    <?php
                    } ?>
                    </section>
                </article>
            <?php
            } ?>
        </section>
    <?php
    }
?>
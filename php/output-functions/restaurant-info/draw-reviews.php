<?php
    function outputReviews() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        require_once('database/data-fetching/reviews.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['id']);
        $reviews = getRestaurantReviews($db, $restaurantID);
        $restaurant_info = getRestaurantInfo($db, $restaurantID);
        $ownerID = $restaurant_info['ownerID']; ?>
        
        <section id="reviews">
            <h3><?=count($reviews)?> Reviews:</h3>

            <?php
            foreach ($reviews as $review) { ?>
                <article class="review">
                    <header><h4>
                        <span class="user"><?=$review['name']?>,</span>
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

                        <?php if ($ownerID === $_SESSION['userID']) { ?>
                            <article id="add-response">
                                <header><h3>Add your response</h3></header>
                                <form id="add-response-form" action="php/actions/add-response.php?reviewID=<?=$review['reviewID']?>&restaurantID=<?=$restaurantID?>" method="post">
                                    <textarea name="response" cols="30" rows="10"></textarea>
                                    <input class="submit" type="submit" value="Submit">
                                </form>
                            </article>  
                        <?php
                        } ?>
                    </section>
                </article>
            <?php
            } ?>

            <?php if ($ownerID !== $_SESSION['userID']) { ?>
                <article id="add-comment">
                    <header><h3>Add your review</h3></header>
                    <form id="add-comment-form" action="php/actions/add-comment.php?restaurantID=<?=$restaurantID?>" method="post">
                        <textarea name="comment" cols="30" rows="10"></textarea>
                        <input class="submit" type="submit" value="Submit">
                    </form>
                </article>            
            <?php
            } ?>
        </section>
    <?php
    }
?>
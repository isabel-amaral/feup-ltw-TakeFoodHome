<?php   
    $db = new PDO('sqlite:' . "../restaurants.db");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $restaurant_id = 1;

    $stmt = $db->prepare(
        'SELECT name
        FROM Dish
        WHERE restaurantID = :id
        ORDER BY category, name'
    );
    $stmt->bindParam(':id', $restaurant_id);
    $stmt->execute();
    $dishes = $stmt->fetch();

    return($dishes)
    

?>


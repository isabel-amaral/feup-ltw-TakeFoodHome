<?php   
    $db = new PDO('sqlite:' . "../restaurants.db");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare(
        'SELECT name
        FROM Dish
        ORDER BY category, name'
    );
    $stmt->execute();
    $dishes = $stmt->fetchAll();

    var_dump($dishes);

    exit($dishes)
    

?>


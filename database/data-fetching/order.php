<?php
  function getOrder($db){
    $stmt = $db->prepare('
    SELECT orderID FROM FoodOrder');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }
?>
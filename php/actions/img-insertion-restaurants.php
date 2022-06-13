<?php
  function insertImageRestaurant($restaurant_info){
    $target_dir = "../../img/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]); 
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["picture"]["tmp_name"]); 
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
        
    }
    if ($uploadOk == 0) {
        $picture = $restaurant_info['picture'];
      } else {
        $picture = "restaurant".$restaurant_info['restaurantID'].".".$imageFileType;
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_dir."restaurant".$restaurant_info['restaurantID'].".".$imageFileType); {
        }
      }
      return $picture;
  }
?>
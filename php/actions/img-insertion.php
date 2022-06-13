<?php
  function insertImage($dish_info){
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
        $picture = $dish_info['picture'];
      } else {
        $picture = "dish".$dish_info['dishID'].".".$imageFileType;
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_dir."dish".$dish_info['dishID'].".".$imageFileType); {
        }
      }
      return $picture;
  }
?>
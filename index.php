<?php
    require_once('php/draw-restaurants.php');
    require_once('php/draw-header.php');
?>

<!-- chamar função output_header() -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <title>TakeFoodHome</title>
</head>
<body>
  
  <?php
    drawHeader()
  ?>
  <?php
    output_restaurants()
  ?>

<!-- chamar função output_footer() -->
  <footer>
    <p>&#169; Take Food Home, 2022</p>
  </footer>
</body>
</html>
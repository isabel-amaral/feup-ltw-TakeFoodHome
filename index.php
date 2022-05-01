<?php
    require_once('php/draw-restaurants.php');
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
  <header>
    <h1>Take Food Home</h1>
    <form>
        <span class="label">Username:</span><input type="text" name="username">
        <span class="label">Password:</span><input type="password" name="pass">
        <span id="login-buttons">
          <a href="">Register</a>
          <button type="submit">Login</button>
        </span>
    </form>
  </header>

  <?php
    output_restaurants()
  ?>

<!-- chamar função output_footer() -->
  <footer>
    <p>&#169; Take Food Home, 2022</p>
  </footer>
</body>
</html>
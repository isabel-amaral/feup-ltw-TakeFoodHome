<?php
    require_once('php/draw-user-orders.php');
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
        drawUserOrders();
    ?>

    <!-- chamar função output_footer() -->
    <footer>
        <p>Take Food Home, 2022</p>
    </footer>
</body>
</html>
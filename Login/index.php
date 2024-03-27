<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href ="css\styles.css"> 
</head>
<body>
    <div class="formulaire"> 
    <h1>Login</h1>
    <form action="includes/login.inc.php" method="post">

        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>

        <label for="last_name">Last Name :</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="register">Log in</button>
    </form>

    <?php
    check_login_errors();
    ?>
</div>
</body>
</html>
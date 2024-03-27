<?php
require_once 'inc/config_session.inc.php';
require_once 'inc/signup_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="formulaire"> 
    <h1>Registration</h1>
    <form action="inc/signup.inc.php" method="post">

        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm">Password confirmation :</label>
        <input type="password" id="confirm" name="confirm" required>

        <button type="submit" name="register">Sign up</button>
    </form>
    <?php
        check_signup_errors();
    ?>
</div>

</body>
</html>
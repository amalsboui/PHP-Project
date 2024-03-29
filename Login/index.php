<?php
session_start();
function check_login_errors()
{
    if(isset($_SESSION["errors_login"]))
    {
        echo '<div class="error-container">';
        
        $errors=$_SESSION["errors_login"];

        echo"<br>";
        unset($_SESSION["errors_login"]);

        foreach($errors as $error){
            echo '<p class="form-error">' . $error . '</p>';
            }
        unset($_SESSION["errors_login"]);

        echo '</div>';
        }
}
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
    <form action="login.php" method="post" novalidate>

        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>

        <label for="last_name">Last Name :</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="register">Log in</button>
    </form>
    <p>Don't have an account? <a href="../registration/index.php">Sign up</a></p>
    <?php
    check_login_errors();
    ?>
</div>
</body>
<script src="script.js"></script>
</html>
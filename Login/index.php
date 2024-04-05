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
    <title>Log in</title>
    <link rel="stylesheet" href ="styles.css"> 
</head>
<body>
<div class="container">
    <div class="formulaire"> 
    <h1>Login</h1>
    <form action="login.php" method="post" novalidate>

        <div class="parent_div">
            <label for="email">Email :</label>
            <input type="text" id="email" name="email" required>
            <div class="error"></div>
            <div class="success"></div>
        </div>

        <div class="parent_div">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" required>
            <div class="error"></div>
            <div class="success"></div>
        </div>

        <button type="submit" name="logIn" id="logIn">Log in</button>
    </form>
    <p>Don't have an account? <a href="../registration/index.php">Sign up</a></p>
    <?php
    check_login_errors();
    ?>
</div>
<img src="pict.png" alt="Registration Image" class="registration-image">
</div>
<script src="verify_inputs.js"></script>
</body>
</html>
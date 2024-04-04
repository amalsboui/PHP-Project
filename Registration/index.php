<?php
session_start();

function check_signup_errors()
{
    if (isset($_SESSION["error_signup"])) {
        echo '<div class="error-container">';
        $error = $_SESSION["error_signup"];
        echo "<br>";
        echo '<p class="form-error">' . $error . '</p>';
        unset($_SESSION["error_signup"]);
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
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
<img src="picc.png" alt="Registration Image" class="registration-image">
    <div class="formulaire"> 
    <h1>Registration</h1>
    
    <form action="signup.php" method="post">

        <div class="parent_div">
            <label for="name " >Name :</label>
            <input type="text" id="name" name="name" required>
            <div class="error"></div>
            <div class="success"></div>
        </div>

        <div class="parent_div">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
            <div class="error"></div>
            <div class="success"></div>
        </div>

        <label for="user_type">Choose your role:</label>   
        <select id="user_type" name="user_type" required>
            <option value="">Select</option>
            <option value="job_seeker">Job seeker</option>
            <option value="recruiter">Recruiter</option>
        </select>
        <div class="parent_div">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <div class="error"></div>
            <div class="success"></div>
        </div>

        <div class="parent_div">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" required>
            <div class="error"></div>
            <div class="success"></div>
        </div>

        <div class="parent_div">
            <label for="confirm">Password confirmation :</label>
            <input type="password" id="confirm" name="confirm" required>
            <div class="error"></div>
            <div class="success"></div>
        </div>

        <button type="submit" name="register" id="register">Sign up</button>
    </form>
    <p>Already have an account? <a href="../Login/index.php">Log in</a></p>
    <?php
        check_signup_errors();
    ?>
</div>
</div>
<script src="verify_inputs.js"></script>
</body>
</html>
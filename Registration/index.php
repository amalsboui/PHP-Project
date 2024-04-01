<?php
session_start();
function check_signup_errors()
{
    if(isset($_SESSION["errors_signup"]))
    {
        echo '<div class="error-container">';
        $errors=$_SESSION["errors_signup"];

        echo"<br>";
        foreach($errors as $error){
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION["errors_signup"]);
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
    <div class="formulaire"> 
    <h1>Registration</h1>
    <form action="signup.php" method="post">

        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="user_type">Choose your role:</label>   
        <select id="user_type" name="user_type" required>
            <option value="job_seeker">Job seeker</option>
            <option value="recruiter">Recruiter</option>
        </select>

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
<script src="verify_inputs.js"></script>
</body>
</html>
<?php
declare(strict_types=1);

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
    } else if (isset($_GET["signup"]) && $_GET["signup"] === 'success')
    {
        echo '<div class="error-container">';
        echo'<br>';
        echo '<p class ="form-success">Signup success!</p>';
        echo '</div>';
    }
}
?>
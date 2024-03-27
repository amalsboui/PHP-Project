<?php

declare(strict_types=1);
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
    }else if (isset($_GET["login"])&& $_GET["login"]==='success')
    {
        echo '<div class="error-container">';
        echo'<br>';
        echo '<p class ="form-sucess">Login sucess!</p>';
        echo '</div>';
    }

}
?>


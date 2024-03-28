<?php
declare(strict_types=1);

function check_job_errors()
{
    if(isset($_SESSION["errors_job"]))
    {
        echo '<div class="error-container">';
        $errors=$_SESSION["errors_job"];

        echo"<br>";
        foreach($errors as $error){
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION["errors_job"]);
        echo '</div>';
    } else if (isset($_GET["job"]) && $_GET["job"] === 'success')
    {
        echo '<div class="error-container">';
        echo'<br>';
        echo '<p class ="form-success">Adding job offer success!</p>';
        echo '</div>';
    }
}

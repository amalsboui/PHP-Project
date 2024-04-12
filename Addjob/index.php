<?php
session_start();
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
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css\styles.css">

<main>
<div class="formulaire"> 
    <h1>Post a Job Offer</h1>
    <form action="submit_job.php" method="post">

        <label for="position">Job Title:</label>
        <input type="text" id="position" name="position" required>

        <label for="category">Job Category:</label>
        <select id="category" name="category" >
            <option value="">Select a category</option>
        </select>

        <label for="employment_type">Employment Type:</label>
        <select id="employment_type" name="employment_type" >
            <option value="">Select a type</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Internship">Internship</option>
        </select>

        <label for="entreprise">Entreprise:</label>
        <input type="text" id="entreprise" name="entreprise" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="description">Job Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
    check_job_errors();
    ?>
</div>
</main>

<script src=../repeated_files/categories.js></script>
</body>
</html>

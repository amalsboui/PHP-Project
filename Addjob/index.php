<?php
require_once 'inc/config_session.inc.php';
require_once 'inc/job_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css\styles.css">
</head>
<body>

<div class="formulaire"> 
    <h1>Post a Job Offer</h1>
    <form action="inc/submit_job.inc.php" method="post">

        <label for="position">Job Title:</label>
        <input type="text" id="position" name="position" required>

        <label for="category">Job Category:</label>
        
        <select id="category" name="category" >
            <option value="">Select a category</option>
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

<script src=script.js></script>
</body>
</html>

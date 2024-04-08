
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Changes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Profile Changes</h2>
        <form action="includes/formsent.inc.php" method="post" enctype="multipart/form-data">

            
            <?php
            session_start();
            if(isset($_SESSION)){
                    if($_SESSION['user_type']=="job_seeker"){
            echo "<label for='info_personnelles'>Projects done before :</label><br>";
            echo "<input  type='text' name='info_personnelles' placeholder='list ur projects and achievements briefly'style='width: 350px; height: 50px' ><br><br>";}
            elseif($_SESSION['user_type']=="recruiter"){
                echo "<label for='info_personnelles'>Company :</label><br>";
                echo "<input  type='text' name='info_personnelles' placeholder='Where do u currently work 'style='width: 350px; height: 50px' ><br><br>";  
            }} ?>

            

            <label for="job">Your job :</label><br>
            <input  type="text" name="job"style="width: 350px; height: 50px" ><br><br>

            <label for="city">City :</label><br>
            <input  type="text" name="city"style="width: 350px; height: 50px" ><br><br>
            <br><br>

            <label for="image">Upload a profile picture :</label><br>
            <input type="file" id="image" name="image"><br><br>

            <input type="submit" value="Save Changes">
            

        </form>
    </div>
</body>
</html>

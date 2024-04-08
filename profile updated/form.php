<?php  
session_start();
include '../repeated_files/connexion_db.php';
include 'user.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Changes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Profile Changes</h2>
        <form action="includes/formsent.inc.php" method="post" enctype="multipart/form-data">

            <label for="name">Name :</label><br>
            <input  type="text" name="name"style="width: 350px; height: 50px" value="<?php echo $user['name']; ?>" ><br>

            <label for="last_name">Last Name :</label><br>
            <input  type="text" name="last_name"style="width: 350px; height: 50px" value="<?php echo $user['last_name']; ?>" ><br>

            <?php
            if(isset($_SESSION)){
                    if($user['user_type']=="job_seeker"){
            echo "<label for='info_personnelles'>Projects done before :</label><br>";
            echo "<input  type='text' name='info_personnelles' placeholder='list ur projects and achievements briefly'style='width: 350px; height: 50px' value=". $user['info_personnelles'] ."><br>";}
            elseif($user['user_type']=="recruiter"){
                echo "<label for='info_personnelles'>Company :</label><br>";
                echo "<input  type='text' name='info_personnelles' placeholder='Where do u currently work 'style='width: 350px; height: 50px'value=". $user['info_personnelles'] ."><br>";  
            }} ?>

            <label for="email">Your mail Adress :</label><br>
            <input  type="text" name="email"style="width: 350px; height: 50px" value="<?php echo $user['email']; ?>" ><br>

            <label for="job">Your job :</label><br>
            <input  type="text" name="job"style="width: 350px; height: 50px" value="<?php echo $user['job']; ?>" ><br>

            <label for="city">City :</label><br>
            <input  type="text" name="city"style="width: 350px; height: 50px"value="<?php echo $user['city']; ?> "><br><br>

            <label for="image" >
                Upload a profile picture:
                <span class="custom-file-upload">
                <i class="fas fa-image"></i>
                <input type="file" id="image" name="image">
                </span>
            </label>
            <br><br><br>

            <input type="submit" value="Save Changes">
            

        </form>
    </div>
</body>
</html>

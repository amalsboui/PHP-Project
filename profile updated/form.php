<?php  
session_start();
include '../repeated_files/connexion_db.php';
$pdo = connectDB::getInstance();
if($_SESSION['user_type']=='admin')
    $id_user = $_GET["id"];
else{
    $id_user=$_SESSION['user_id'];
}
include 'user.php';
$user=getUser($pdo, $id_user);
?>
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
        <form action="includes/formsent.inc.php?id=<?php echo $user['id_user']; ?>" method="post" enctype="multipart/form-data">
        
            <?php
            if(isset($_SESSION)){
                    if($user['user_type']=="job_seeker"){
            echo "<label for='info_personnelles'>Projects done before :</label><br>";
            echo "<input  type='text' name='info_personnelles' placeholder='list ur projects and achievements briefly'style='width: 350px; height: 50px' value=". $user['info_personnelles'] ."><br>";}
            elseif($user['user_type']=="recruiter"){
                echo "<label for='info_personnelles'>Company :</label><br>";
                echo "<input  type='text' name='info_personnelles' placeholder='Where do u currently work 'style='width: 350px; height: 50px'value=". $user['info_personnelles'] ."><br>";  
            }} ?>

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

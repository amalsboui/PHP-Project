<?php
session_start();
include '../repeated_files/connexion_db.php';
include 'user.php';

/*
if (isset($_SESSION['lastInsertedId'])){
$lastInsertedId=$_SESSION['lastInsertedId'];
$user= getuserbyId($lastInsertedId,$pdo);
}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="stylesheet.css">


    <?php
        if ($_SESSION['user_type']=='admin') {
            include("../homePage/view/header_admin.php");
        } else {
            include("../homePage/view/header.php");
        }
        ?>
    <?php include_once "../repeated_files/connexion_db.php";?>
    <?php include_once '../homePage/view/search_filter.php';?>
</head>
<body>
<main>
<div class="row d-flex justify-content-center">
    <div class="col-md-10 mt-5 pt-5">
        <div class="row z-depth-3">
            <div class="col-sm-4 bg-custom-3 rounded-left">
                <div class="card-block text-center text-white">
                    
                    <label for="avatar">
                        <?php
                        if ($user){
                        echo "<img src='includes/uploads/" . $user['image_url'] .  "'style ='width: 200px; height:200 px border-radius: 50%' class='avatar-image' alt='profilepicture'>";
                    }
                      else{ 
                        
                       echo " <i class='fas fa-user-tie fa-7x mt-5'> </i> ";
                      }
                        ?> 
                    </label><br>
                    <?php
                        if($user){
                            echo $user['username'];
                        }?><br>
                         <?php
                        if($user){
                            echo $user['job'];
                        }?>
                    <form method="post">
                        <a href="form.php" class="btn btn-primary">
                            <input type="hidden" name="id" value="<?php echo $user['id_user']?> ">
                            Edit Profile
                        </a>
                    </form>
                    <?php
                            if($_SESSION["user_type"] == "admin") {
                                echo '<form action="delete_user.php" method="post">
                                    <input type="hidden" name="id" value="' . $user['id_user'] . '">
                                    <button type="submit" class="btn btn-danger" title="Delete User">
                                        <i class="fas fa-trash fa-x text-gray-300"></i>
                                        Delete User
                                    </button>
                                </form>';
                            }
                        ?>
                </div>
            </div>
            <div class="col-sm-8 bg-white rounded-right">
                <h3 class="mt-3 text-center">Profile</h3>
                <hr class="badge-primary mt-0 w-25">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="font-weight-bold">Email :</p>
                        <?php 
                        if($user){
                            echo $user['email'];
                        }?>
                    </div>
                    <div class="col-sm-6">
                        <p class="font-weight-bold">Ville :</p>
                        <?php
                        if($user){
                            echo $user['city'];
                        }?>
                    </div>
                </div>
                <?php
                if($user){
                    if($user['user_type']=="job_seeker"){
                echo "<h4 class='mt-3'>Projects done before:</h4>";
                echo "<hr class='bg-primary'>";
                 echo $user['info_personnelles']; }
                else{
                    echo "<h4 class='mt-3'> Entreprise actuelle:</h4>";
                    echo "<hr class='bg-primary'>";
                    echo $user['info_personnelles'];
                }}
                        ?>
            </div>
        </div>
    </div>
</div>
</main>
<?php include_once '../homePage/view/footer.php';?>
</body>
</html>
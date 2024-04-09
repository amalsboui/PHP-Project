<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $info_personnelles = $_POST['info_personnelles'];
    $job = $_POST['job'];
    $city = $_POST['city'];
    /*$username=$_POST['username'];
    $email=$_POST['email'];*/

    $fileName=$_FILES["image"]["name"];
    $fileSize=$_FILES["image"]["size"];
    $tmpName=$_FILES["image"]["tmp_name"];
    $error=$_FILES["image"]["error"];
    $img_ex=pathinfo($fileName, PATHINFO_EXTENSION);
    $newname=uniqid("IMG-",true).'.'.strtolower($img_ex);
    $imguploadpath='uploads/'.$newname;
    move_uploaded_file($tmpName,$imguploadpath);

    try{
        require_once  "../../repeated_files/connexion_db.php";
        $pdo = connectDB::getInstance();
        $id_user = $_GET["id"];
        include '../user.php';
        $user=getUser($pdo, $id_user);

        $query = "
        UPDATE users
        SET info_personnelles = ?, job = ? , city = ? , image_url=? 
        WHERE id_user = ?;";
        $stmnt=$pdo->prepare($query);
        $stmnt->execute([$info_personnelles, $job,$city,$newname,$id_user]);

        if($_SESSION['user_type']=="admin"){
        echo "<script>alert('Your Profile has been successfully edited');
        window.location.href = '../index.php?id=" . $user['id_user'] . "';</script>";}
        else{
            echo "<script>alert('Your Profile has been successfully edited');
        window.location.href = '../index.php';</script>";
        }


        $pdo=null;
        $stmnt=null;
        exit(); 
    }
    catch(PDOException $e){

        die("Query failed".$e->getMessage());
    }

   
}
else{ 
    header("Location: ../form.php");
}
 
 

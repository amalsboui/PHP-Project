<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projects = $_POST['projects'];
    $job = $_POST['job'];
    $city = $_POST['city'];
    $username=$_POST['username'];
    $email=$_POST['email'];

    $fileName=$_FILES["image"]["name"];
    $fileSize=$_FILES["image"]["size"];
    $tmpName=$_FILES["image"]["tmp_name"];
    $error=$_FILES["image"]["error"];
    $img_ex=pathinfo($fileName, PATHINFO_EXTENSION);
    $newname=uniqid("IMG-",true).'.'.strtolower($img_ex);
    $imguploadpath='uploads/'.$newname;
    move_uploaded_file($tmpName,$imguploadpath);





    
    try{
        require_once  "dbh.inc.php";
        $query = "INSERT INTO profilechanges (projects,job, city, image_url,username,email) VALUES (?,?,?,?,?,?);";
        $stmnt=$pdo->prepare($query);
        $stmnt->execute([$projects, $job,$city,$newname,$username,$email]);
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
 

<?php
session_start();
if (!isset($_SESSION["user_id"])){
    header("Location:../HomePage");
} 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user=$_SESSION['user_id'];
    $job=$_POST['id_job'];


    $CLETTER=$_POST['CL'];

    $fileName=$_FILES["CV"]["name"];
    $fileSize=$_FILES["CV"]["size"];
    $tmpName=$_FILES["CV"]["tmp_name"];
    $PDF_ex=pathinfo($fileName, PATHINFO_EXTENSION);
    $newname=$_SESSION['user_id'].'_'.$_POST['id_job'].'.'.strtolower($PDF_ex);
    $pdfuploadpath='./uploads/'.$newname;
    //move_uploaded_file($tmpName,$pdfuploadpath);
    try{

        require_once  "../repeated_files/connexion_db.php";
        $pdo = connectDB::getInstance();
        $query = "INSERT INTO application (motivation,id_jobseeker,id_job) VALUES (?,?,?);";
        $stmnt=$pdo->prepare($query);

        if (isset($_SESSION['user_id'])){
            $stmnt->execute([$CLETTER, $user,$job]);
            move_uploaded_file($tmpName,$pdfuploadpath);
        }
        $pdo=null;
        $stmnt=null;
        echo"<script>alert('Application done')</script>";
        header("Location:../jobdetails/index.php?id=".$job."&&job_done=1");

        exit(); 
        

    }
    catch(PDOException $e){

        die("Query failed".$e->getMessage());
    }
}
else{ 
    header("Location: ../form.php");
}
 

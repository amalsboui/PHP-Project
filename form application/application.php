<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $CLETTER=$_POST['CL'];
    $fileName=$_FILES["CV"]["name"];
    $fileSize=$_FILES["CV"]["size"];
    $tmpName=$_FILES["CV"]["tmp_name"];
    $PDF_ex=pathinfo($fileName, PATHINFO_EXTENSION);
    $newname=uniqid("CV",true).'.'.strtolower($PDF_ex);
    $pdfuploadpath='uploads/'.$newname;
    move_uploaded_file($tmpName,$pdfuploadpath);
    try{
        require_once  "dbh.inc.php";
        $query = "INSERT INTO applications (cv_file_path, cover_letter_text,user_id) VALUES (?,?,?);";
        $stmnt=$pdo->prepare($query);
        if (isset($_SESSION['id_user'])){
        $stmnt->execute([$newname, $CLETTER, $_SESSION['id_user']]);}
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
 

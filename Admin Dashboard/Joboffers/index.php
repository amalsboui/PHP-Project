<?php
session_start();

if (!isset($_SESSION["authenticated"])) {
    header("Location: ../../login/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeOffer</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-indigo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="..\..\homePage\view\style.css">
</head>
<body>
 
   <?php  
    include "../../repeated_files/connexion_db.php";
    include '../../homePage/view/search_filter.php';
    include '../../homePage/index.php';
    /*include "../../homePage/view/footer.php";  */
    ?>

   
   


  
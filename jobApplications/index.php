<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</script>
<script src="../repeated_files/search.js"></script>
<body>

    
   <?php include("../homePage/view/header.php");  ?>

   <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800 mt-5 mb-3">Applications </h1>
    </div>

   <?php
   if(isset($_POST["id_job"])) {?>
    <?php  require_once "applications_db.php";
    $id_job=$_POST["id_job"];
    $applications=get_applications($id_job);
    if(count($applications)>0){
   foreach($applications as $application) {
    ?>
    <div class="card m-3 " style="display :flex">
        <div class="card-body">
            <h2 class="card-title"><?php echo$application["name"]." ".$application["last_name"] ?> </h5>

            <p class="card-text"><?php echo$application["motivation"] ?></p>
            <br>
            <?php echo'<a href="mailto:'.$application["email"].'" class="card-link">📧 </a>';?>
            <?php echo'<a href="../form application/uploads/'.$id_job.'_'.$application["id_user"].'.pdf" class="btn btn-primary" download="'.$id_job.'_'.$application["id_user"].' ">download resume</a> ';?>

         </div>
    </div>

    <?php }}
    else echo'no applications found';}

    ?>

      <!-- Footer -->
  <?php include("../homePage/view/footer.php"); ?>


</body>
</html>
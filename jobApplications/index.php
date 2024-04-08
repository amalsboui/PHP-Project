
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
<body>
    
   <?php include("../homePage/view/header.php"); ?>  
    <?php  require_once"applications_db.php";
    $id_job=$_POST["id_job"];
    $applications=get_applications($id_job);
   foreach($applications as $application) {
    ?>
    <div class="card m-3 " style="display :flex">
        <div class="card-body">
            <h2 class="card-title"><?php echo$application["name"]." ".$application["last_name"] ?> </h5>

            <p class="card-text"><?php echo$application["motivation"] ?></p>
            <?php echo'<a href="mailto:'.$application["email"].'" class="card-link">📧</a>';?>
            <?php echo'<a href="../cvs/cv'.$id_job.$application["id_user"].'.pdf" class="card-link">see resume</a>';?>

         </div>
    </div>
    <?php }?>

      <!-- Footer -->
  <?php include("../homePage/view/footer.php"); ?>


</body>
</html>
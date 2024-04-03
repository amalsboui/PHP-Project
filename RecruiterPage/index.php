
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
<?php include("../global/view/header.php"); ?>  
<?php include("jobs_recruiter_db.php");

session_start();

$userId =/* $_SESSION["user_id"]*/3 ;
$jobs=get_jobs($userId);
//var_dump($jobs);
echo '<div class="d-flex justify-content-center row m-4">';
foreach($jobs as $job){
    ?>
    <div class="card p-2 m-3 " >
   <h5 class="d-block font-weight-bold"> <?php echo $job["position"]?></h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">
        <?php echo $job["entreprise"]."  📍  ".$job["location"]."  📅   ".$job["date_added"] ?>
     </h6>
      <p class="card-text">  <?php echo$job["description"] ?></p>
      <form action="../jobApplications/index.php" method="post">
        <input type="hidden"  name= "id_job" value=<?php echo$job['id_job'] ?> >
        <input type="submit">
      </form>

    </div>

   <!--<div class="row mt-2 g-1">
        <div class="col-md-3">
            <div class="card p-2">
                <div class="text-right"> <small>Full Time</small> </div>
                <div class="text-center mt-2 p-3"> <img src="https://img.icons8.com/color/96/000000/google-logo.png" width="60" /> <span class="d-block font-weight-bold">UX Designer</span>
                    <hr> <span>Google Inc</span>
                    <div class="d-flex flex-row align-items-center justify-content-center"> <i class="fa fa-map-marker"></i> <small class="ml-1">FA 100, OH, USA</small> </div>
                    <div class="d-flex justify-content-between mt-3"> <span>$40,000</span> <button class="btn btn-sm btn-outline-dark">Apply Now</button> </div>
                </div>
            </div>
        </div> !-->
  </div>

  <?php 
}

?>
</div>
  <?php include("../global/view/footer.php"); ?>

</body>
</html>
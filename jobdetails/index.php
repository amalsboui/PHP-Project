<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="../repeated_files/search.js"></script>
    
    <title>Job Details</title>
</head>
<body>
    <?php include "../repeated_files/connexion_db.php" ?>
    <?php include_once '../homePage/view/header.php';?>
    <?php include_once '../homePage/view/search_filter.php';?>
    <?php
   
    
  
    if (isset($_GET['job_done']) && $_GET['job_done']==1 ) {
      echo"<script>alert('Application done')</script>";

    }
    include_once 'job.php'
    ?>
    


    <main class=" container d-flew flex-row justify-content-evenly ">
      <div class="card w3-theme-l5 ">
        
        <div class="card-body d-flex flex-column">
          <div class="card-title" ><?php echo("🚀".$job["position"] )?></div>
          <span class="text-muted font-italic "><?php calculate_time($job["created_at"])?></span>
          <div class="tags mb-2 mt-1">
              <span class="badge bg-secondary"><?php echo $job["employment_type"] ?></span>
              <span class="badge bg-primary"><?php echo $job["category"] ?></span>
          </div>
          <ul class="list-group list-group-flush ">
            <li class="list-group-item w3-theme-l5"><?php echo("🧱".$job["entreprise"] )?></li>
            <li class="list-group-item w3-theme-l5"><?php echo("📍".$job["location"] )?></li>
          </ul>


          <p class="card-text"><?php echo($job["description"] )?></p>

          <!-- Button apply only displayed for job seekers or in public page -->
          <?php if((isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "job_seeker") || !isset($_SESSION["user_type"])){?>
            <form action="<?php echo( isset($_SESSION) ? "../form application/index.php" : "../login/index.php" ); ?>" method="post"> 
            <input type="hidden" name="id_job" value="<?php echo $job["id_job"] ?>">
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary w3-theme-d4 align-self-end mt-auto">Apply</a>
            </div>
          <?php }?>

          <div class="d-flex flex-direction-row justify-content-end">

          <?php
            /*You can only see applications if you're an admin or if you are a recruiter who posted that job */
            if(isset($_SESSION["user_type"]) &&  isset($_SESSION["user_id"]) && ($_SESSION["user_type"] == "admin" || $job["id_recruiter"]==$_SESSION["user_id"])) { ?>
              <form action="../jobApplications/index.php" method="post">
                <input type="hidden" name="id_job" value="<?php echo $job['id_job'];?>">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info  align-self-end mt-auto w3-theme-d4" title="See applications">
                          See Applications
                    </button>
                </div>
              </form>
          <?php  }?>
          
          <!-- if the user is an admin he can delete the job offer -->
          <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"]=="admin") { ?>
            <form action="delete_jobOffer.php" method="post">
                <input type="hidden" name="id_job" value="<?php echo $job['id_job'];?>">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info  align-self-end mt-auto btn-danger"  title="Delete Job Offer">
                          Delete Job Offer
                    </button>
                </div>
            </form>

            <form action="../form application/index.php" method="post"> 
              <input type="hidden" name="id_job" value="<?php echo $job["id_job"] ?>">
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn  btn-warning align-self-end mt-auto">Add application</a>
              </div>
            </form>
              
              
          <?php } ?>

          </div>
                    

    </main>

    <?php include_once '../homePage/view/footer.php';?>
</body>
</html>



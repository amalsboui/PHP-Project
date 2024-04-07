<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
</head>
<body>
    <?php include "../repeated_files/connexion_db.php" ?>
    <?php include_once '../homePage/view/header.php';?>
    <?php include_once '../homePage/view/search_filter.php';?>
    <?php
    session_start();
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
          <?php if($_SESSION["user_type"] == "job_seeker" || !isset($_SESSION)){?>
            <input type="hidden" name="id_job" value="' . $job['id_job'] . '">
            <div class="d-flex justify-content-end">
              <a href="<?php echo( isset($_SESSION) ? "../form application/index.php" : "../login/index.php" ); ?>" class="btn btn-primary w3-theme-d4 align-self-end mt-auto">Apply</a>
            </div>
            <?php }?>

            <?php
                /*You can only see applications if you're an admin or if you are a recruiter who posted that job */
                if($_SESSION["user_type"] == "admin" || $job["id_recruiter"]==$_SESSION["user_id"]) { ?>
                  <form action="../jobApplications/index.php" method="post">
                    <input type="hidden" name="id_job" value="' . $job['id_job'] . '">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-info  align-self-end mt-auto" title="See applications">
                              See Applications
                        </button>
                   </div>
                    </form>
              <?php  }?>
                    

    </main>

    <?php include_once '../homePage/view/footer.php';?>
</body>
</html>



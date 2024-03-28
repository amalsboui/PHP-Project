<?php include("jobs_db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeOffer</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-indigo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
   <?php include("view/header.php"); ?>  

    <main class=" container d-flew flex-row justify-content-evenly">
      <?php foreach($jobs as $job): ?>
      <div class="card w3-theme-l5">
        
        <div class="card-body">
          <div class="card-title" ><?php echo("🚀".$job["position"] )?></div>
          <p class="card-text"><?php echo($job["description"] )?></p>
          <ul class="list-group list-group-flush ">
            <li class="list-group-item w3-theme-l5"><?php echo("🧱".$job["entreprise"] )?></li>
            <li class="list-group-item w3-theme-l5"><?php echo("📍".$job["location"] )?></li>
          </ul>
          <a href="#" class="btn btn-primary w3-theme-d4">Apply</a>
        </div>

      </div>
      <?php endforeach;?>

    </main>

  <hr>

  <div class="w3-center">
    <!-- Pagination -->
    <div class="w3-center w3-padding-32">
      <div class="w3-bar">
        <a href="#" class="w3-bar-item w3-button w3-hover-theme">«</a>
        <a href="#" class="w3-bar-item w3-button w3-theme w3-hover-theme">1</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-theme">2</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-theme">3</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-theme">4</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-theme">5</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-theme">»</a>
      </div>
    </div>
  </div>
  <br>


  <!-- Footer -->
  <?php include("view/footer.php"); ?>
  
</body>
</html>
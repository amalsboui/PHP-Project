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

 <!--    Side Navigation -->
     <nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
        
        <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
        <a href="#" class="w3-bar-item w3-button">Log in</a>
        <a href="#" class="w3-bar-item w3-button">Registration</a>
        <a href="#" class="w3-bar-item w3-button">Add a job offer</a>
        
    </nav>


    
    <header class="w3-container w3-theme-d4 w3-padding d-flex flex-column" id="myHeader">

        <div class="d-flex flex-row justify-content-between" >
            <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme-d4"></i> 
            <form class="d-flex col-4" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>

        <div class="w3-center">
          <h4>......</h4>
          <h1 class="w3-xxxlarge w3-animate-bottom">WeOffer</h1>
        </div>
    </header>   
 
   <?php //include("../view/header.php"); ?>  

    <main class=" container d-flew flex-row justify-content-evenly">
      <?php foreach($jobs as $job): ?>
      <div class="card w3-theme-l5">
        
        <div class="card-body">
          <div class="card-title" ><?php echo("🚀".$job["position"] )?></div>
          <p class="card-text"><?php echo($job["description"] )?></p>
          <ul class="list-group list-group-flush ">
            <li class="list-group-item w3-theme-l5"><?php echo("🧱".$job["entreprise"] )?></li>
            <li class="list-group-item w3-theme-l5"><?php echo("📍".$job["location"] )?></li>
            <!-- <li class="list-group-item w3-theme-l5">A third item</li> -->
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
    <?php include("../view/footer.php"); ?>
  
    <script>
        // Side navigation
        function w3_open() {
          var x = document.getElementById("mySidebar");
          x.style.width = "100%";
          x.style.fontSize = "40px";
          x.style.paddingTop = "10%";
          x.style.display = "block";
        }
        function w3_close() {
          document.getElementById("mySidebar").style.display = "none";
        }
    </script>   
    
    
</body>
</html>
<?php require_once 'jobs_db.php'?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
   <?php session_start(); ?>
   <?php include("view/header.php"); ?> 
   <?php include "categories.php" ?>
   
   


   <!--Filters-->
<div class="container mt-3">
    <h2>Filters</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <div class="row">
            <div class="col-md-4">
            <label for="category">Category:</label> 
            <select id="category" class="form-select" name="category">
                <option value="all" <?php echo (isset($_GET["category"]) && $_GET["category"] == "all") ? "selected" : ""; ?>>All Categories</option>
                <?php foreach ($jobCategories as $categoryItem): ?>
                    <option value="<?php echo $categoryItem; ?>" <?php echo (isset($_GET["category"]) && $_GET["category"] == $categoryItem) ? "selected" : ""; ?>><?php echo $categoryItem; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
            <div class="col-md-4">
                <label for="employment_type">Employment Type:</label>
                <select id="employment_type" class="form-select" name="employment_type">
                    <option value="all" <?php if(isset($_GET["employment_type"]) && $_GET["employment_type"] == "all") echo "selected"; ?>>All Types</option>
                    <option value="fulltime" <?php if(isset($_GET["employment_type"]) && $_GET["employment_type"] == "fulltime") echo "selected"; ?>>Full Time</option>
                    <option value="parttime" <?php if(isset($_GET["employment_type"]) && $_GET["employment_type"] == "parttime") echo "selected"; ?>>Part Time</option>
                    <option value="intern" <?php if(isset($_GET["employment_type"]) && $_GET["employment_type"] == "intern") echo "selected"; ?>>Internship</option>
                </select>
            </div>
            <div class="col-md-4" id="category-options">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
            </div>
        </div>
        <button type="submit" class="btn btn-primary w3-theme-d4 mt-3">Apply Filters</button>
    </form>
</div>

<?php require_once 'view/search_filter.php'?>


<main class=" container d-flew flex-row justify-content-evenly">
      <?php foreach($jobs as $job): ?>
      <div class="card w3-theme-l5">
  
        <div class="card-body d-flex flex-column">
          <div class="card-title" ><?php echo("🚀".$job["position"] )?></div>
          <span class="text-muted font-italic "><?php calculate_time($job["created_at"])?></span>
          <div class="tags mb-2 mt-1">
              <span class="badge bg-secondary " ><?php echo $job["employment_type"] ?></span>
              <span class="badge bg-primary"><?php echo $job["category"] ?></span>
          </div>
          <p class="card-text"><?php echo(strlen($job["description"]) > 284 ? substr($job["description"], 0, 284) . '...' : $job["description"]);?></p>
          <ul class="list-group list-group-flush ">
            <li class="list-group-item w3-theme-l5"><?php echo("🧱".$job["entreprise"] )?></li>
            <li class="list-group-item w3-theme-l5"><?php echo("📍".$job["location"] )?></li>
          </ul>
         
          <a href="../jobdetails/index.php?id=<?php echo $job['id_job']; ?>" class="btn btn-primary w3-theme-d4 align-self-end mt-auto">See More</a>
        
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
  

  
<script>
    var jobCategories = <?php echo json_encode(array_values($jobCategories)); ?>;

    const categorySelect = document.getElementById("category");

    jobCategories.forEach(category => {
        const option = document.createElement("option");
        option.text = category;
        option.value = category;
        categorySelect.add(option);
    });
</script>

  </script>
</body>
</html>
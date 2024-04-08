<?php require 'jobs_db.php'?>
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

<?php 

session_start(); 
  if(isset($_SESSION))
  {
    if($_SESSION["user_type"] == 'admin') {
        include("view/header_admin.php");
    } else {  
        include("view/header.php");
    }
  }else{
    include("view/header.php");
  }
include "categories.php"; 
?>


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


<?php require_once 'show_jobs.php'?>

    

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
<script src="script.js" > </script>
</body>
</html>

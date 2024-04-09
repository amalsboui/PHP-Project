<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Form</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<div class="container">
  <?php /*
  if (!isset($_SESSION["user_id"])){
    header("Location:../Login/index.php");
} */
   ?>
  <h2>Apply Now</h2>
  <form action="application.php?id_job=". method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="texte">Cover Letter :</label>
      <textarea id="CL" name="CL" rows="4" cols="50"></textarea>
    </div>
    <div class="form-group">
      <label for="pdf">Upload Your Cv :</label>
      <input type="file" id="CV" name="CV" accept=".pdf">
      <input type="hidden" name="id_job" value=<?php echo $_POST['id_job'];?>>

    </div>
    <button type="submit" class="btn-submit">Apply Now </button>
  </form>
</div>

</body>
</html>


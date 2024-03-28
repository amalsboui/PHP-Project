<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>
<header class="w3-container w3-theme-d4 w3-padding d-flex flex-column" id="myHeader">

<div class="d-flex flex-row justify-content-between" >
<a class="btn btn-outline-light" href="homepage.php">Home</a>
    <form class="d-flex col-4" role="search">
    <input id="recherche" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
    </form>
</div>


</header> 
   
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mt-5 pt-5">
            <div class="row z-depth-3">
                <div class="col-sm-4 bg-custom-3 rounded-left">
                    <div class="card-block text-center text-white">
                    <input type="file" id="avatar" name="avatar" accept="image/*" style="display:none;">
                    <label for="avatar">
                        <i class="fas fa-user-tie fa-7x mt-5"> </i>  
</label>
                    <?php
                    session_start();
                    if(isset($_SESSION['name'])){
                        $name=$_SESSION['name'];
                    echo "<h2 class='font-weight-bold my-4'> $name</h2>";}
                    else{
                        echo "<h2 class='font-weight-bold my-4'> username </h2>";}?>
                        <?php 
                if(isset($_POST['modify'])){
                    echo '<form method="post">';
                    echo '<input  type="text" name="job_value" placeholder="job" style="width: 150px; height: 40px";>';
                    echo '<input class="btn btn-sm btn-outline-primary" type="submit" name="save" value="Save">';
                    echo '</form>';} 
                else{echo '...';}
                    if(isset($_POST['save'])){
                        $jobValue=$_POST['job_value'];
                         echo "<p> $jobValue </p>";
                    }?>
                    <form method="post">
                    <input type="submit" name="modify" id="inmodify" onclick="changebutton()" class="btn btn-sm btn-outline-primary" value="Make changes">
                    <input class="btn btn-sm btn-outline-primary" onclick="savebutton()" id="insave" type="submit" name="save" value="Save">
                    </form>
                    </div>
                </div>
                <div class="col-sm-8 bg-white rounded-right">
                <h3 class="mt-3 text-center">Profile</h3>
                <hr class="badge-primary mt-0 w-25">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="font-weight-bold">Email :</p>
                        <?php
                            
                            if (isset($_SESSION['email'])){
                                $email = $_SESSION['email'];
                                echo "<h6 class='text-muted'> $email </h6>";}?>
                    </div>
                    <div class="col-sm-6">
                    <p class="font-weight-bold">Ville :</p>
                    <?php
                    if(isset($_POST['modify'])){
                   echo'
            <form method="post">
             <select  name="ville">
            <option value="Tunis">Tunis</option>
            <option value="Sfax">Sfax</option>
            <option value="Monastir">Monastir</option>
            <option value="Ariana">Ariana</option>
            <option value="Sousse">Sousse</option>
            <option value="Mahdiz">Mahdia</option>
            <option value="Medenine">Medenine</option>
            <option value="Nabeul">Nabeul</option>
            <option value="Ben Arous3">Ben Arous</option>
            <option value="Bizerte">Bizerte</option>
            <option value="Gabes">Gabes</option>
            <option value="Manouba">Manouba</option>
            <option value="Zaghouan">Zaghouan</option>
            <option value="Beja">Beja</option>
            <option value="Tozeur">Tozeur</option>
            <option value="Kairouan">Kairouan</option>
            <option value="Kef">Kef</option>
            <option value="Siliana">Siliana</option>
            <option value="Sidi Bouzid">Sidi Bouzid</option>
            <option value="Tataouine">Tataouine</option>
            <option value="Gafsa">Gafsa</option>
            <option value="Kasserine">Kasserine</option>
            <option value="Jendouba">Jendouba</option>
            <option value="Kebili">Kebili</option>
             </select>
              <input class="btn btn-sm btn-outline-primary" type="submit" name="save" value="Save">
             </form>';
             }
             else{
                echo '...';
             }
             if(isset($_POST['save'])){
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['ville'])){
                $villeValue=$_POST['ville'];
                 echo "<p> $villeValue </p>";
            }}}?>
                    </div>
                    </div>
               
                <h4 class="mt-3">Projects done before:</h4>
                <hr class="bg-primary">
                <?php 
                if(isset($_POST['modify'])){
                    echo '<form method="post">';
                    echo '<input  type="text" name="new_value" placeholder="list ur projects and achievements briefly" style="width: 800px; height: 80px";>';
                    echo '<input class="btn btn-sm btn-outline-primary" type="submit" name="save" value="Save">';
                    echo '</form>';}   
                    if(isset($_POST['save'])){
                        $newValue=$_POST['new_value'];
                         echo "<p> $newValue </p>";
                    }
                
                ?>
                </div>
            </div>

        </div>
    </div>
    <footer class="text-center text-white" style="background-color: #f1f1f1;" id="footer">
  <!-- Grid container -->
  <div class="container pt-2">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-linkedin"></i
      ></a>
      <!-- Github -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>

<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title>Contact Us</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../repeated_files/search.js"></script>

<?php 
  include("../homePage/view/header.php"); 
?>

  <div class="w3-padding-64 w3-content " id="contact">
    <h2 >Contact Us</h2>
    <hr style="width:200px" class="w3-opacity">

    <div class="w3-section">
      <p><i class="fa fa-map-marker fa-fw  w3-xxlarge w3-margin-right"></i> Centre Urbain Nord, Tunisia</p>
      <p><i class="fa fa-phone fa-fw  w3-xxlarge w3-margin-right"></i> Phone: +00 151515</p>
      <p><i class="fa fa-envelope fa-fw  w3-xxlarge w3-margin-right"> </i> Email: weoffer@gmail.com</p>
    </div><br>
    <p>Let's get in touch. Send us a message:</p>

    <form action="contact.php" method="post" target="_blank">
      <p><input class="w3-input  w3-padding-16" type="text" placeholder="Name" required name="name"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="subject"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="message"></p>
      <p>
        <button class="w3-button  w3-padding-large btn btn-primary w3-theme-d4" name="submit" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  </div>

  <?php include("../homePage/view/footer.php"); ?>


</body>
</html>
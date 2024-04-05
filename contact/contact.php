<?php 

if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $ourEmail = "yasmineelhakem8@gmail.com";
    $headers = "From: " . $email;
    $txt = "You have received an email from " . $name . ".\n\n" . $message;
    
    if(mail($ourEmail, $subject, $txt, $headers)){
        echo "<script>alert('Message has been sent');</script>";
    } else{
        echo "<script>alert('Message not sent');</script>"; 
    }
    echo " <script>window.location.href = 'index.php';</script>";
    exit(); 
}
?>

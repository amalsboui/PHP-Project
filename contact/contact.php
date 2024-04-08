<?php 

if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $ourEmail = "yasmineelhakem8@gmail.com";
    $headers = "From: " . $email;
    $txt = "You have received an email from " . $name . ".\n\n" . $message;

    // Configure SMTP settings
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", "587");

    // Send email using Gmail SMTP
    if(mail($ourEmail, $subject, $txt, $headers)){
        echo "Your message has been sent!";
    } else {
        echo "Your message has not been sent!";
    }
}

?>

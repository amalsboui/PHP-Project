<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    
    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try{
    
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable SMTP debugging

    $mail->isSMTP();  /// Set mailer to use SMTP
    $mail->SMTPAuth = true;  // Enable SMTP authentication 
    
    // SMTP server configuration
    $mail->Host = "smtp.gmail.com";   //Define SMTP server hostname
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption 
    $mail->Port = 587;   //Port TCP to connect TLS
 
    $mail->Username = "yasmineelhakem8@gmail.com"; //nom d'utilisateur serveur SMTP (gmail)
    $mail->Password = "yiti yrbl epzr uhml"; //password of my application weoffer
    
    // Set sender and recipient
    $mail->setFrom($email, $name);
    $mail->addAddress("yasmineelhakem8@gmail.com"); //Ajouter un destinataire

    // Set email format to HTML: subject + body
    $mail->isHTML(true);
    $mail->Subject= $subject.", Received from: <".$email.">\r\n";
    $email_format = "
    <h2> This email is sent from ".$name."</h2>\r\n
    <p>Email: ".$email."</p>\r\n
    <p>Subject: ".$subject."</p>\r\n
    <p>Message: ".$message."</p>\r\n
    ";
    $mail->Body = $email_format;

    $mail->send();

    echo "<script>alert('Message sent successfully');</script>";

    }catch(Exception $e){
        echo "<script>alert('Message not sent. Error:{$mail->ErrorInfo}');</script>"; 
    }

    echo " <script>window.location.href = 'index.php';</script>";
    exit(); 

?>

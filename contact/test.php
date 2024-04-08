<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require_once "vendor/autoload.php";


    function contactUsmail($name,$email,$subject, $description)
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host= 'smtp.gmail.com';
        $mail->SMTPAuth= true;
        $mail->Username= 'yasmineelhakem8@gmail.com';
        $mail->Password='pw';
        $mail->SMTPSecure='tls';
        $mail->Port= 587;  
        $mail->setFrom($email,$name);
        $mail->addAddress("yasmineelhakem8@gmail.com");
        $mail->isHTML(true);
        $mail->Subject= $subject.", Received from: <".$email.">\r\n";
        $email_template = "
        <h2> This email is sent from ".$name."</h2>\r\n
        <p>Email: ".$email."</p>\r\n
        <p>Subject: ".$subject."</p>\r\n
        <p>Message: ".$description."</p>\r\n
        ";

        $mail->Body= $email_template;
        $mail->send();
        //echo"Message has been sent";

    }


    if(isset($_POST["submit"])){
        //getting user information
        $name= $_POST["name"];
        $email= $_POST["email"];
        $subject= $_POST["subject"];
        $message= $_POST["message"];

        //recipient email address (admin)
        $to= "yasmineelhakem8@gmail.com";
            
        //headers for sending email
        $headers = "From: ".$name. " < ".$email." > \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        if(trim($name)!="" &&
        trim($email)!="" &&
        trim($subject)!="" &&
        trim($message)!=""
        ){
            //php mailer function
            $result=contactUsmail("$name","$email","$subject","$message");
            header("Location:contact.php?success"); 
        }
        else{
            echo "missing";
            header("Location:contact.php?missing");    
        }    
    }

?>
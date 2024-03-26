<?php  
    require_once('config.php');
    if(isset($_POST['register']) ){
        $name=$_POST["name"];
        $last_name=$_POST["last_name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirm=$_POST["confirm"];

        

        if(! filter_var($email,FILTER_VALIDATE_EMAIL)){
            die("Please enter a valid email address");
        }

        if($password != $confirm ){
            die("Passwords do not match");
        }
        print_r($_POST);

        $password_hash=password_hash($password,PASSWORD_DEFAULT);
        

        echo $name." ".$email." ".$password_hash." ".$confirm;

        $db = connectDB::getInstance();

        $sql="INSERT INTO users (name,last_name,email,password) VALUES(?,?,?,?)";
        $statement=$db->prepare($sql);
        $res=$statement->execute([$name,$last_name,$email,$password_hash]);
        if($res){
            //header('location:index.php');
            echo "successful insertion";
        }
        else{
            echo "error";
        }

    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="formulaire"> 
    <h1>Registration</h1>
    <form action="inscri.php" method="post">

        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm">Password confirmation :</label>
        <input type="password" id="confirm" name="confirm" required>

        <button type="submit" name="register">Sign up</button>
    </form>
</div>
</body>
</html>
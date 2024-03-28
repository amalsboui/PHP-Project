<?php

if($_SERVER["REQUEST_METHOD"] === "POST")
{
        $name=$_POST["name"];
        $last_name=$_POST["last_name"];
        $user_type=trim($_POST["user_type"]);
        echo $user_type;
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirm=$_POST["confirm"];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'signup_contr.inc.php';
        //ERROR HANDLERS
        $errors=[];
        if(is_input_empty($name,$last_name,$email,$password,$confirm,$user_type)){
            $errors["empty_input"]="Fill in all fields !";     
        }
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors["email_incorrect"] ="Please enter a valid email address";
        }
        
        if(isEmailTaken($pdo,$email))
        {
            $errors["email_incorrect"] ="Email already taken ";
        }
        
        if(isNameandlastNameTaken($pdo,$name,$last_name))
        {
            $errors["name_incorrect"] ="Name and last name already taken ";
        }
        
        if($password != $confirm ){
            $errors["password_incorrect"]="Passwords do not match";
        }
        
        if(strlen($password)<8)
        {
            $errors["password_incorrect"]="Password must be at least 8 characters";
        }
        if(!preg_match("/[a-z]/i",$password))
        {
            $errors["password_incorrect"]="Password must contain at least one letter";
        }
        if(!preg_match("/[0-9]/i",$password))
        {
            $errors["password_incorrect"]="Password must contain at least one number";
        }
        
        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"]=$errors;
           header("Location:../index.php");
            die();
        }
        print_r($_POST);

        
        $sql = "INSERT INTO users (name, last_name, user_type, email, password) VALUES (:name, :last_name, :user_type, :email, :password)";
        $stmt = $pdo->prepare($sql);

        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":user_type", $user_type); 
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPwd);
        
        echo "SQL Query: $sql<br>";
        $stmt->execute();


        header("Location:../../Addjob/index.php");

        $pdo=null;
        $stmt=null;
        die();
    }catch(PDOException $e)
        {
            error_log("PDOException: " . $e->getMessage());
            die("Query failed: " . $e->getMessage() . " (Code: " . $e->getCode() . ")");
        }
    }else{
        header("Location:../index.php");
        die();
    }
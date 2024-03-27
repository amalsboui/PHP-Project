<?php

if($_SERVER["REQUEST_METHOD"] === "POST")
{
        $name=$_POST["name"];
        $last_name=$_POST["last_name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirm=$_POST["confirm"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_contr.inc.php';
        //ERROR HANDLERS
        $errors=[];
        if(is_input_empty($name,$last_name,$email,$password,$confirm)){
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

        
        $sql="INSERT INTO users (name,last_name,email,password) VALUES(:name,:last_name,:email,:password)";
        $stmt=$pdo->prepare($sql);

        $options=[
            'cost' => 12
        ];
        $hashedPwd = password_hash($password,PASSWORD_BCRYPT,$options);
        
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":password",$hashedPwd);
        $stmt->bindParam(":last_name",$last_name); 
        $stmt->bindParam(":email",$email); 

        $stmt->execute();

        header("Location:../index.php?signup=success");

        $pdo=null;
        $stmt=null;
        die();
    }catch(PDOException $e)
        {
            die("Query failed: ".$e->getMessage());
        }
    }else{
        header("Location:../index.php");
        die();
    }
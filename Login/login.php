<?php
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $password = $_POST["password"];

    try {
        require_once '../repeated_files/connexion_db.php';
        require_once 'user_db.php';
        require_once 'error_functions.php';

        

        $pdo = connectDB::getInstance();
        //ERROR HANDLERS

        $errors = [];

        /*
        if(is_input_empty($name,$last_name,$password)){
            $errors[] = "Fill in all fields!";    
        }
        else{*/

        $result=get_user($pdo,$name,$last_name);

        if(is_username_wrong($result))
        {
            $errors[] = "Incorrect login info!";
        }
        if(!is_username_wrong($result) && is_password_wrong($password, $result["password"]))
        {
            $errors[] = "Incorrect login info!";
        }
    
        

        if (!empty($errors)) {
        $_SESSION["errors_login"] = $errors;
        header("Location: index.php");
        exit();
        }

        $_SESSION["user_id"]=$result["id"];
        $_SESSION["user_name"]=htmlspecialchars($result["name"]);
        $_SESSION["user_last_name"]=htmlspecialchars($result["last_name"]);

        header("Location:../Addjob/index.php");

        $pdo=null;
        die();

    }catch(PDOException $e)
        {
            die("Query failed: ".$e->getMessage());
        }
    }else{
        header("Location:index.php");
        die();
    }


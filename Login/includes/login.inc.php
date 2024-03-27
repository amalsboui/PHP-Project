<?php

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $password = $_POST["password"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        //ERROR HANDLERS
        $errors=[];
        if(is_input_empty($name,$last_name,$password)){
            $errors["empty_input"]="Fill in all fields !";     
        }
        $result=get_user($pdo,$name,$last_name);

        if(is_username_wrong($result))
        {
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if(!is_username_wrong($result) && is_password_wrong($password, $result["password"]))
        {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once 'config_session.inc.php';

        if($errors)
        {
            $_SESSION["errors_login"] = $errors;

            header("Location:../index.php");
            die();
        }
        
        $_SESSION["user_id"]=$result["id"];
        $_SESSION["user_name"]=htmlspecialchars($result["name"]);
        $_SESSION["user_last_name"]=htmlspecialchars($result["last_name"]);
        $_SESSION["last_regeneration"]=time();

        header("Location:../index.php?login=success");

        $pdo=null;
        die();

    }catch(PDOException $e)
        {
            die("Query failed: ".$e->getMessage());
        }
    }else{
        header("Location:../index.php");
        die();
    }


    
        












  
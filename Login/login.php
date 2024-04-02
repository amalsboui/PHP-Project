<?php
session_start();
function get_user(object $pdo,string $email)
{
    $query="SELECT * FROM users WHERE email = :email;";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once '../repeated_files/connexion_db.php';
        require_once 'error_functions.php';

        

        $pdo = connectDB::getInstance();
        //ERROR HANDLERS

        $errors = [];

        $result=get_user($pdo,$email);

        if(is_email_wrong($result))
        {
            $errors[] = "Incorrect login info!";
        }
        if(!is_email_wrong($result) && is_password_wrong($password, $result["password"]))
        {
            $errors[] = "Incorrect login info!";
        }
    
        

        if (!empty($errors)) {
        $_SESSION["errors_login"] = $errors;
        header("Location: index.php");
        exit();
        }

        $_SESSION["user_id"]=$result["id_user"];
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


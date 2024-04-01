<?php

function isEmailTaken(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result !== false;
}

if($_SERVER["REQUEST_METHOD"] === "POST")
{
        $name=$_POST["name"];
        $last_name=$_POST["last_name"];
        $user_type=$_POST["user_type"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirm=$_POST["confirm"];

    try {
        
        require_once '../repeated_files/connexion_db.php';
        //require_once 'error_functions.php';
        //ERROR HANDLERS
        
        $pdo = connectDB::getInstance();
        session_start();

        
        //$errors=[];

        /*
        if(is_input_empty($name,$last_name,$email,$password,$confirm,$user_type)){
            $errors[]="Fill in all fields !";     
        }
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[] ="Please enter a valid email address";
        }*/
        
        if(isEmailTaken($pdo,$email)){    
            echo "<script>alert('This email is already taken'); 
            window.location.href = 'index.php';</script>";
            exit();
            /* kif l user yclicki al ok mtaa l alert yaawed yredirectih lel page mtaa registration*/ 
        }
        

        /*
        if(isNameandlastNameTaken($pdo,$name,$last_name))
        {
            $errors[] ="Name and last name already taken ";
        }
        
        if($password != $confirm ){
            $errors[]="Passwords do not match";
        }
        
        

        if($errors){
            $_SESSION["errors_signup"]=$errors;
           header("Location:../index.php");
            die();
        }
        print_r($_POST);*/

        else{
        $sql = "INSERT INTO users (name, last_name, user_type, email, password) VALUES (:name, :last_name, :user_type, :email, :password)";
        $stmt = $pdo->prepare($sql);

        
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":user_type", $user_type); 
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPwd);
        
        //echo "SQL Query: $sql<br>";
        $stmt->execute();

        /*  //rigelha hedhi 9ali mayaarfch l variable $result
        $_SESSION["user_id"]=$result["id"];
        $_SESSION["user_name"]=htmlspecialchars($result["name"]);
        $_SESSION["user_last_name"]=htmlspecialchars($result["last_name"]);*/

        //header("Location:index.php?registration=success");

        echo "<script>alert('Registered successfully');
        window.location.href = 'index.php';</script>";
        exit();

        $pdo=null;
        $stmt=null;
        }
    }catch(PDOException $e)
        {
            error_log("PDOException: " . $e->getMessage());
            
        }
    }else{

        /*mafhemtech l else hedhi win bech thez w chnou trati*/
        header("Location:index.php");
        die();
    }
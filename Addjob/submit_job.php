<?php

if($_SERVER["REQUEST_METHOD"] === "POST")
{
        $position=$_POST["position"];
        $category=$_POST["category"];
        $employment_type=$_POST["employment_type"];
        $entreprise=$_POST["entreprise"];
        $location=$_POST["location"];
        $description=$_POST["description"];
        

    try {
        require_once '../repeated_files/connexion_db.php';
        require_once 'error_functions.php';
        //ERROR HANDLERS
        $pdo = connectDB::getInstance();

        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../login/index.php");
            exit(); 
        }

        $recruters_id = $_SESSION['user_id'];


        $errors=[];
        if(is_input_empty($position,$category,$employment_type,$entreprise,$location,$description)){
            $errors[]="Fill in all fields !";     
        }
     
        

        if($errors){
            $_SESSION["errors_job"]=$errors;
           header("Location:index.php");
            die();
        }
        print_r($_POST);

        $sql="INSERT INTO jobs (position,category,employment_type,entreprise,location,description,recruters_id) VALUES(:position,:category,:employment_type,:entreprise,:location,:description,:recruters_id)";
        $stmt=$pdo->prepare($sql);

       
        
        $stmt->bindParam(":position",$position);
        $stmt->bindParam(":category",$category);
        $stmt->bindParam(":employment_type",$employment_type);
        $stmt->bindParam(":entreprise",$entreprise); 
        $stmt->bindParam(":location",$location);        
        $stmt->bindParam(":description",$description); 
        $stmt->bindParam(":recruters_id",$recruters_id);

        $stmt->execute();

        header("Location:../homePage/index.php");

        $pdo=null;
        $stmt=null;
        die();
    }catch(PDOException $e)
        {
            die("Query failed: ".$e->getMessage());
        }
    }else{
        header("Location:index.php");
        die();
    }
<?php

if($_SERVER["REQUEST_METHOD"] === "POST")
{
        $position=$_POST["position"];
        $category=$_POST["category"];
        $entreprise=$_POST["entreprise"];
        $location=$_POST["location"];
        $description=$_POST["description"];

    try {
        require_once 'dbh.inc.php';
        require_once 'job_contr.inc.php';
        //ERROR HANDLERS

        require_once 'config_session.inc.php';

        if (!isset($_SESSION['user_id'])) {
            header("Location: ../../login/index.php");
            exit(); 
        }

        $recruters_id = $_SESSION['user_id'];


        $errors=[];
        if(is_input_empty($position,$category,$entreprise,$location,$description)){
            $errors["empty_input"]="Fill in all fields !";     
        }
     
        

        if($errors){
            $_SESSION["errors_job"]=$errors;
           header("Location:../index.php");
            die();
        }
        print_r($_POST);

        $sql="INSERT INTO jobs (position,category,entreprise,location,description,recruters_id) VALUES(:position,:category,:entreprise,:location,:description,:recruters_id)";
        $stmt=$pdo->prepare($sql);

       
        
        $stmt->bindParam(":position",$position);
        $stmt->bindParam(":category",$category);
        $stmt->bindParam(":entreprise",$entreprise); 
        $stmt->bindParam(":location",$location);        
        $stmt->bindParam(":description",$description); 
        $stmt->bindParam(":recruters_id",$recruters_id);

        $stmt->execute();

        header("Location:../index.php?addingjob=success");

        $pdo=null;
        $stmt=null;
        die();
    }catch(PDOException $e)
        {
            die("Query failed: ".$e->getMessage());
        }
    }else{
        echo "erruerrrrrr";
        //header("Location:../index.php");
        die();
    }
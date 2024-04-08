<?php
var_dump($_SESSION);
    $pdo = connectDB::getInstance();
    if ($_SESSION['user_type']=='admin') {
        try {         
            if(isset($_GET['id'])) {
                $id_user = $_GET["id"];
            
                $query = "SELECT * FROM users WHERE id_user =:id";
                $statement = $pdo->prepare($query);
                $statement->bindParam(":id",$id_user);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_ASSOC);
    
                if (!$user) {
                    die("User not found");
                }

            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    else{
        try{
            $id=$_SESSION["user_id"];
            $query=" SELECT * FROM users WHERE id_user =:id";
            $statement = $pdo->prepare($query);
            $statement->bindParam(":id",$id);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            die("Query failed: " . $e->getMessage());
        }

    }

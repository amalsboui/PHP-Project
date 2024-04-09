<?php
    function getUser($pdo, $id_user){
    if ($_SESSION['user_type']=='admin') {
        try {                 
                $query = "SELECT * FROM users WHERE id_user =:id_user";
                $statement = $pdo->prepare($query);
                $statement->bindParam(":id_user",$id_user);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_ASSOC);
    
                if (!$user) {
                    die("User not found");
                }
                return $user;
            }
         catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    else{
        try{
            $id_user=$_SESSION["user_id"];
            $query=" SELECT * FROM users WHERE id_user =:id_user";
            $statement = $pdo->prepare($query);
            $statement->bindParam(":id_user",$id_user);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
        catch(PDOException $e){
            die("Query failed: " . $e->getMessage());
        }

    }
}
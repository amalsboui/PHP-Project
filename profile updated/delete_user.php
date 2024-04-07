<?php
    include '../repeated_files/connexion_db.php';
    $pdo = connectDB::getInstance();
    //get user with id and then delete him
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
                $id_user = $_POST["id"];
            
                $query = "DELETE FROM users WHERE id_user = :id";
                $statement = $pdo->prepare($query);
                $statement->bindParam(":id", $id_user);               
                $statement->execute();

                echo "<script>alert('User Deleted Successfully');
                window.location.href = '../Admin Dashboard/users/jobseekers/index.php';</script>";
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
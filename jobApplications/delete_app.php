<?php
    include '../repeated_files/connexion_db.php';
    $pdo = connectDB::getInstance();

    //get job application with id_app and then delete it
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            $id_app= $_POST["id_app"];
            delete_app($pdo,$id_app);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    function delete_app($pdo,$id_app)
    {
        try{
        $query = "DELETE FROM application WHERE id_app = :id_app";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id_app", $id_app);               
        $statement->execute();

        echo "<script>alert('Job Application Deleted Successfully');
        window.location.href = '/php-project/jobApplications/index.php';</script>";
        }catch(PDOException $e){
            die("Query failed".$e->getMessage());
        }
    }
    
?>
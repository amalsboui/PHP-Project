<?php
    include '../repeated_files/connexion_db.php';
    $pdo = connectDB::getInstance();

    //get job offer with id_job and then delete it
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
                $id_job= $_POST["id_job"];
                delete_jobOffer($pdo,$id_job);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    function delete_jobOffer($pdo,$id_job)
    {
        $query = "DELETE FROM jobs WHERE id_job = :id_job";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id_job", $id_job);               
        $statement->execute();

        echo "<script>alert('Job Offer Deleted Successfully');
        window.location.href = '/php-project/homePage/index.php';</script>";
    }
?>
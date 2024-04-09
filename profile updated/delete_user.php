<?php
    include '../repeated_files/connexion_db.php';
    $pdo = connectDB::getInstance();
    //get user with id and then delete him
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
                $id_user = $_POST["id"];
                $user_type = $_POST["user_type"];
               /* if($user_type == 'recruiter')
                {
                    
                    echo "<script>
                    if (!confirm('Are you sure you want to delete this recruiter? All the job offers and applications associated would be deleted.'))
                    {
                        alert('Deletion cancelled');
                        window.location.href='index.php';
                    } else {
                        <?php
                        delete_user($user_type, $pdo, $id_user);
                        ?>
                    }</script>";
                      
                }
                else{
                    delete_user($user_type,$pdo,$id_user);
                }*/
                delete_user($user_type,$pdo,$id_user);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    function delete_user($user_type,$pdo,$id_user)
    {
        $query = "DELETE FROM users WHERE id_user = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id_user);               
        $statement->execute();

        echo "<script>alert('User Deleted Successfully');
        window.location.href = '../Admin Dashboard/users/index.php?type=Recruiters';</script>";
    }

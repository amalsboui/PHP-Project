<?php 
require('../repeated_files/connexion_db.php'); 
    function get_applications($id){
        $db = connectDB::getInstance();
        $query='SELECT users.id_user, users.name, users.last_name, users.email, application.motivation from users,application where application.id_jobseeker=users.id_user AND application.id_job=?';
        $statement=$db->prepare($query);
        $statement->execute([$id]);
        $jobs=$statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $jobs;}

    ?>
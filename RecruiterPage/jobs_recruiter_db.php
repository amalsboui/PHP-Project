
<?php 
require('../repeated_files/connexion_db.php'); 
    function get_jobs(int $id){
        $db = connectDB::getInstance();
        $query='SELECT id_job,position,SUBSTRING(description,1,120) as description,entreprise,category,location,employment_type,id_recruiter,created_at FROM jobs WHERE id_recruiter=? ';
        $statement=$db->prepare($query);
        $statement->execute([$id]);
        $jobs=$statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $jobs;}

    ?>
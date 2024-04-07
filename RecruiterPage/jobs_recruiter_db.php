
<?php 
require('../global/config.php'); 
    function get_jobs(int $id){
    $db = connectDB::getInstance();
    $query='SELECT id_job,position,SUBSTRING(description,1,120) as description,entreprise,location,id_recruiter,date_added FROM jobs WHERE id_recruiter=?';
    $statement=$db->prepare($query);
    $statement->execute([$id]);
    $jobs=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $jobs;}

    ?>
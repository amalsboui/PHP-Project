<?php require('../global/config.php'); 
    function get_jobs(int $id){
    $db = connectDB::getInstance();
    $query='SELECT * FROM jobs WHERE id_recruiter=?';
    $statement=$db->prepare($query);
    $statement->execute([$id]);
    $jobs=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $jobs;}

    ?>
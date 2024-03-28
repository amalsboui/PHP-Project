<?php
    require('config.php');
    $db = connectDB::getInstance();
    $query='SELECT * FROM jobs';
    $statement=$db->prepare($query);
    $statement->execute();
    $jobs=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
   // print_r ($jobs);
    //echo gettype($jobs);//type of $jobs array of arrays each row is an array

?>
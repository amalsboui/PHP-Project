<?php
    include '../repeated_files/connexion_db.php';
    $db = connectDB::getInstance();
    $query='SELECT * FROM jobs';
    $statement=$db->prepare($query);
    $statement->execute();
    $jobs=$statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
   // print_r ($jobs);
    //echo gettype($jobs);//type of $jobs array of arrays each row is an array
    function calculate_time($created)
    {
            $timeDifference = time() - strtotime($created);

            $hoursAgo = floor($timeDifference / (60 * 60));
            $daysAgo = floor($timeDifference / (24 * 60 * 60));
            $monthsAgo = floor($daysAgo / 30); 

            if ($monthsAgo == 1) {
                echo "1 month ago";
            }elseif ($monthsAgo > 1) {
                echo "$monthsAgo months ago";
            }elseif ($daysAgo == 1) {
                echo "1 day ago";
            }elseif ($daysAgo > 1) {
                echo "$daysAgo days ago";
            }elseif ($hoursAgo==1){
                echo "1 hour ago";
            }
            else {
                echo "$hoursAgo hours ago";
            }
    }
?>
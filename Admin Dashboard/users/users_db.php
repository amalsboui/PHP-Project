<?php
    require '../../repeated_files/connexion_db.php';
    $pdo = connectDB::getInstance();
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
    function countRecords($pdo, $table, $condition = "") {
        $query = "SELECT COUNT(*) FROM $table $condition";
        $statement = $pdo->query($query);
        return $statement->fetchColumn();
    }
    $total_jobseekers = countRecords($pdo, 'users', "WHERE user_type = 'job_seeker'");
    $total_recruiters = countRecords($pdo, 'users', "WHERE user_type = 'recruiter'");


    //Search 
    
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        try {
            $pdo = connectDB::getInstance();
            if(isset($_GET['type'])) {
                $type = $_GET['type'];
                if($type=='Recruiters')
                {
                    $query = "SELECT * FROM users WHERE user_type='recruiter'";
                }
                else{
                    $query = "SELECT * FROM users WHERE user_type='job_seeker'";
                }
                if(isset($_GET["search"])) {
                    $search = $_GET["search"];

                    $query .= " AND (name LIKE :search OR last_name LIKE :search OR city LIKE :search OR job LIKE :search )";
                }
    
                $statement = $pdo->prepare($query);

                if(isset($_GET["search"])) {
                    $statement->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                }

            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                echo 'error: no GET parameter';
            }
            
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    ?>

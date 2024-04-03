<?php
    require_once '../../../repeated_files/connexion_db.php';
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


    //Search 
    //lfilter commentithom pour le moment baad tw nrak7hom
    
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        try {
            $pdo = connectDB::getInstance();

            $query = "SELECT * FROM users WHERE user_type='job_seeker'";

            if(isset($_GET["search"])) {
                $search = $_GET["search"];

                $query .= " AND (name LIKE :search OR last_name LIKE :search OR city LIKE :search OR job LIKE :search )";
            }
/*
            if(isset($_GET["category"], $_GET["employment_type"], $_GET["location"])) {
                $category = $_GET["category"];
                $employment_type = $_GET["employment_type"];
                $location = $_GET["location"];

                if ($employment_type !== "all") {
                    $query .= " AND employment_type = :employment_type";
                }
                if (!empty($location)) {
                    $query .= " AND location LIKE :location";
                }
                if ($category !== "all") {
                    $query .= " AND category = :category";
                }
            }
*/
            $statement = $pdo->prepare($query);

            if(isset($_GET["search"])) {
                $statement->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            }

          /*  if(isset($_GET["category"], $_GET["employment_type"], $_GET["location"])) {
                if ($employment_type !== "all") {
                    $statement->bindValue(':employment_type', $employment_type);
                }
                if (!empty($location)) {
                    $statement->bindValue(':location', '%' . $location . '%');
                }
                if ($category !== "all") {
                    $statement->bindValue(':category', $category);
                }
            }
*/
            $statement->execute();
            $jobseekers = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    ?>

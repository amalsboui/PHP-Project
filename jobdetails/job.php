
<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $pdo = connectDB::getInstance();

    
        if(isset($_GET['id'])) {
            $jobId = $_GET["id"];
        
            $query = "SELECT * FROM jobs WHERE id =:jobId";
            $statement = $pdo->prepare($query);
            $statement->bindParam(":jobId",$jobId);
            $statement->execute();
            $job = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$job) {
                die("Job not found");
            }
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location:../homePage/index.php");
    die();
}
function calculate_time($created)
    {
            $timeDifference = time() - strtotime($created);

            $hoursAgo = floor($timeDifference / (60 * 60));
            $daysAgo = floor($timeDifference / (24 * 60 * 60));
            $monthsAgo = floor($daysAgo / 30); 

            if ($monthsAgo >= 1) {
                echo "$monthsAgo months ago";
            } elseif ($daysAgo >= 1) {
                echo "$daysAgo days ago";
            } else {
                echo "$hoursAgo hours ago";
            }
    }

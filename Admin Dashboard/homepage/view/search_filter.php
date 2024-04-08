<?php
require_once '../../../repeated_files/connexion_db.php';
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $pdo = connectDB::getInstance();

        $query = "SELECT * FROM jobs WHERE 1";

        if(isset($_GET["search"])) {
            $search = $_GET["search"];

            $query .= " AND (position LIKE :search OR category LIKE :search OR employment_type LIKE :search OR description LIKE :search OR entreprise LIKE :search OR location LIKE :search)";
        }

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

        $statement = $pdo->prepare($query);

        if(isset($_GET["search"])) {
            $statement->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }

        if(isset($_GET["category"], $_GET["employment_type"], $_GET["location"])) {
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

        $statement->execute();
        $jobs = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
?>
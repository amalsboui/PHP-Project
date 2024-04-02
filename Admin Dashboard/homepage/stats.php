<?php
    require_once '../../repeated_files/connexion_db.php';

    function countRecords($pdo, $table, $condition = "") {
        $query = "SELECT COUNT(*) FROM $table $condition";
        $statement = $pdo->query($query);
        return $statement->fetchColumn();
    }

    $total_users = countRecords($pdo, 'users');
    $total_jobs = countRecords($pdo, 'jobs');
    $total_jobseekers = countRecords($pdo, 'users', "WHERE user_type = 'job_seeker'");
    $total_recruiters = countRecords($pdo, 'users', "WHERE user_type = 'recruiter'");
    $total_applications = countRecords($pdo, 'applications');

    $pdo = null;
?>


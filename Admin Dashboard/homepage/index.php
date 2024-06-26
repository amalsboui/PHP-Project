
<!-- Password to test admin dashboard is Password123 -->

<?php 
session_start();

if (!isset($_SESSION["authenticated"])) {
    header("Location: ../../login/index.php");
    exit();
}?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <script src="../../repeated_files/search_admin.js"></script>
 
<?php
require_once '../../repeated_files/connexion_db.php';
require_once 'stats.php';
require_once '../../homePage/view/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 mt-5 mb-3">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row justify-content-center">
<!--first row-->
    <div class="col-xl-8 mb-4">
        <div class="row">
            <!-- Users Card -->
            <div class="col mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_users ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-3x text-gray-300"></i> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Job Offers Card -->
            <div class="col mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Job Offers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_jobs ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Second Row-->
    <div class="col-xl-10 mb-4">
    <div class="row">
        <!-- Jobseekers Card -->
        <div class="col mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Job Seekers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_jobseekers ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-3x text-gray-300"></i> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recruiters Card -->
        <div class="col mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Recruiters</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_recruiters ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Applications Card -->
        <div class="col mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Applications</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_applications ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php
require_once '../../homePage/view/footer.php';
?>


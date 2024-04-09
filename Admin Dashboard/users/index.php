<?php 
session_start();

if (!isset($_SESSION["authenticated"])) {
    header("Location: ../../login/index.php");
    exit();
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="../../repeated_files/search_admin.js"></script>

   
    <?php include("../../homePage/view/header.php"); ?> 
    <?php require_once ("users_db.php") ;?>
   

    

<div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
    <h1 class="h3 mb-0 text-gray-800 mt-5 mb-3"><?php echo $type ?></h1>
</div>
<div class="container">
<div class="row">
    <div class="col-lg-12 card-margin">
        <div class="card search-form">
            <div class="card-body p-0">
                <form id="search-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                    <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   
<div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                <div class="result-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="records">Showing: <b>1-20</b> of <b><?php echo($type =='job_seeker' ? $total_jobseekers : $total_recruiters) ?></b></div>
                                        </div>
                                        <div class="col-lg-6 d-flex justify-content-end"> 
                                            <a href="/PHP-Project/Registration/index.php" class="btn btn-warning ml-auto">Add User</a> <!-- Apply ml-auto to push the button to the right -->
                                        </div>
                                    </div>
                                </div>

                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                        <thead> <!-- Table Header Section -->
                                            <tr>
                                                <th>Profile Picture</th>
                                                <th>Name</th>
                                                <th>Title/Role</th>
                                                <th><?php echo($type =='Jobseekers' ? 'Projects' : 'Entreprise') ?></th>
                                                <th>City</th>
                                                <th>User Profile</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php foreach($users as $user): ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="widget-26-job-emp-img">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Company" />
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="widget-26-job-title">
                                                            <a href="#"><?php echo $user["name"] ." ". $user["last_name"]?></a>
                                                            <p class="m-0"> <span class="text-muted time"><?php calculate_time($user["created_at"])?></span></p>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                    <div class="widget-26-job-title">
                                                    <?php
                                                        if (isset($user["job"])) { 
                                                            echo '<div class="widget-26-job-info">';
                                                            echo '<p class="text-muted m-3"> <span class="location">' . $user["job"] . '</span></p>';
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                    <div class="widget-26-job-title">
                                                    <?php
                                                        if (isset($user["info_personnelles"])) { 
                                                            echo '<div class="widget-26-job-info">';
                                                            echo '<p class="text-muted m-2"><span class="location">' . (strlen($user["info_personnelles"]) > 70 ? substr($user["info_personnelles"], 0, 100) . '...' : $user["info_personnelles"]) . '</span></p>';
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                    <div class="widget-26-job-title">
                                                    <?php
                                                        if (isset($user["city"])) { 
                                                            echo '<div class="widget-26-job-info">';
                                                            echo '<p class="text-muted m-2"><span class="location">' . $user["city"] . '</span></p>';
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                        </div>
                                                    </td>
                                            
                                                    <td class="align-middle">
                                                        <div class="widget-26-job-category ">   
                                                            <a href="/PHP-Project/profile updated/index.php?id=<?php echo $user['id_user']; ?>" class="btn btn-primary w3-theme-d4 align-self-end mt-auto">User Details</a>
                                                        </div>
                                                    </td>
                                                
                                                    
                                                </tr>
                                                <?php endforeach;?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-base pagination-boxed pagination-square mb-0">
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link no-border" href="#">1</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">2</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">3</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ("../../homePage/view/search_filter.php") ;?>
<?php include ("../../homePage/view/footer.php") ;?>
   
</body>
</html>
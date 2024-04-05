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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

   <?php include("../../../homePage/view/header_admin.php"); ?> 
   <?php include ("../../../homePage/view/search_filter.php") ;?>
   <?php require_once ("users_db.php") ;?>

    


<div class="container">
<div class="row">
    <div class="col-lg-12 card-margin">
        <div class="card search-form">
            <div class="card-body p-0">
                <form id="search-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Location</option>
                                    </select>
                                </div>
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
                                            <div class="records">Showing: <b>1-20</b> of <b><?php echo $total_jobseekers ?></b></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="result-actions">
                                                <div class="result-sorting">
                                                    <span>Sort By:</span>
                                                    <select class="form-control border-0" id="exampleOption">
                                                        <option value="1">Relevance</option>
                                                        <option value="2">Names (A-Z)</option>
                                                        <option value="3">Names (Z-A)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody>
                                            <?php foreach($jobseekers as $jobseeker): ?>
                                                <tr>
                                                    <td>
                                                        <div class="widget-26-job-emp-img">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Company" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-title">
                                                            <a href="#"><?php echo $jobseeker["name"] ." ". $jobseeker["last_name"]?></a>
                                                            <p class="m-0"><a href="#" class="employer-name"><?php echo $jobseeker["job"]?></a> <span class="text-muted time"><?php calculate_time($jobseeker["created_at"])?></span></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-info">
                                                            <p class="type m-0">Full-Time</p>
                                                            <p class="text-muted m-0">in <span class="location"><?php echo $jobseeker["city"]?></span></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-salary">$ 50/hr</div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-category bg-soft-base">
                                                            <i class="indicator bg-base"></i>
                                                            <span>Software Development</span>
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
</body>
</html>
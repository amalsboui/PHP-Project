<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-indigo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        a:hover {
        text-decoration: none; 
        }
    </style>
    
</head>


<body>

    <!-- Header -->

    <header class="w3-container w3-theme-d4 w3-padding d-flex flex-column" >
        <div class="d-flex flex-row justify-content-between" >
    
                <!-- Navbar to display on screens >= 970px -->
                <div class="w3-bar w3-theme-d4 w3-left-align w3-xlarge" id="navbar">
                    <p class="w3-bar-item " style=" height: 70px; width: 90px; ">
                    <img src="/PHP-Project/homePage/view/logo.png" alt="Logo" style="width: 100%; height: 100%; transform: translateY(-8px);"></p>
                    <?php if(!isset($_SESSION["user_id"])){ ?>
                        <a href="../Login/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white " >Log in</a>
                        <a href="../Registration/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Register</a>
                        <a href="../Login/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Add Job Offer</a> 
                    <?php } else{ ?>
                        <a href="../addjob/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Add Job Offer</a> 
                    <?php } ?>
                    <a href="../contact/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
                </div>

                <!-- Sidebar to display on screens < 970px -->
                <nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
                    <button class="w3-bar-item w3-button w3-theme-l4 " onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
                    <?php if(!isset($_SESSION["user_id"])){ ?>
                        <a href="../Login/index.php" class="w3-bar-item w3-button w3-theme-d4">Log in</a>
                        <a href="../Registration/index.php" class="w3-bar-item w3-button w3-theme-d4">Register</a>
                        <a href="../Login/index.php" class="w3-bar-item w3-button w3-theme-d4">Add a job offer</a>
                    <?php } else{ ?>
                        <a href="../Addjob/index.php" class="w3-bar-item w3-button w3-theme-d4">Add a job offer</a>
                        
                    <?php } ?>
                    <a href="../contact/index.php" class="w3-bar-item w3-button w3-theme-d4">Contact us</a>
                </nav>
                <div class="w3-container w3-theme-d4 w3-padding" id="myHeader">
                    <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme-d4"></i> 
                </div>
                
                <!-- Search -->
                <form class="d-flex  col-sm-7 col-md-4" role="search" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" style="height:60%;">
                    <button class="btn btn-outline-light" type="submit" style="height:60%;">Search</button>
                </form>
                

                <!-- Profile and logout -->
                <?php if(isset($_SESSION["user_id"])){ ?>
                    <form action="view/logout.php" class="w3-xlarge" method="post">
                    <button type="submit" class="w3-bar-item w3-button w3-hide-xxlarge w3-hover-white">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                    </form> 

                    <div class=w3-xlarge>
                        <a href="../profile updated/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Profile</a>
                        <!--
                        <button type="submit" class="w3-bar-item w3-button w3-hide-xlarge w3-hover-white w3-xlarge">
                             Profile<i class='fas fa-user-alt' style='font-size:20px'></i> 
                            Profile<i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                        </button>
                    </div>
                <?php } ?>
                
        </div>

        <div class="w3-center">
            <h1 class="w3-xxlarge w3-animate-bottom">WeOffer</h1>
        </div>
    </header> 
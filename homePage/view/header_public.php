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

                <div class="w3-bar w3-theme-d4 w3-left-align w3-xlarge">
                    <p class="w3-bar-item " style=" height: 70px; width: 90px; ">
                    <img src="/PHP-Project/homePage/view/logo.png" alt="Logo" style="width: 100%; height: 100%; transform: translateY(-8px);"></p>
                    <a href="../Login/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white " >Log in</a>
                    <a href="../Registration/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Register</a>
                    <a href="../Login/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Add Job Offer</a> 
                    <a href="../contact/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
                </div>
                        
                <form class="d-flex col-4" role="search" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" style="height:60%;">
                    <button class="btn btn-outline-light" type="submit" style="height:60%;">Search</button>
                </form>
        </div>

        <div class="w3-center">
            <h1 class="w3-xxlarge w3-animate-bottom">WeOffer</h1>
        </div>
    </header> 
    


    
    <!-- Side Navigation  hedhi nhotouha on small screens mezelt mech mrigla-->

    <nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
        <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
        <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
        <a href="../Login/index.php" class="w3-bar-item w3-button">Log in</a>
        <a href="../Registration/index.php" class="w3-bar-item w3-button">Registration</a>
        <a href="../Addjob/index.php" class="w3-bar-item w3-button">Add a job offer</a>
    </nav>

    <script>
        // Side navigation
        function w3_open() {
            var x = document.getElementById("mySidebar");
            x.style.width = "100%";
            x.style.fontSize = "40px";
            x.style.paddingTop = "10%";
            x.style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script> 
        


    

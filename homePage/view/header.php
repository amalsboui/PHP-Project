<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-indigo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    
</head>


<body>

    <!-- Header -->

    <header class="w3-container w3-theme-d4 w3-padding d-flex flex-column" id="myHeader">
    <div class="d-flex flex-row justify-content-between" >
    <div class="w3-bar w3-theme-d4 w3-left-align ">
        <p class="w3-bar-item ">Logo mtaa weoffer</p>
        <a href="#team" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Team</a>
        <a href="#work" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Work</a>
        <a href="#pricing" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Price</a>
        <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button" title="Notifications">Dropdown <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                <a href="#" class="w3-bar-item w3-button">Link</a>
                <a href="#" class="w3-bar-item w3-button">Link</a>
                <a href="#" class="w3-bar-item w3-button">Link</a>
                </div>
            </div>
    </div>
        
        <form class="d-flex col-4" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
    </div>

    <div class="w3-center">
        <h4>....</h4>
        <h1 class="w3-xxxlarge w3-animate-bottom">WeOffer</h1>
    </div>
</header>  
<!-- Side Navigation  hedhi nhotouha on small screens mezelt mech mrigla-->
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
<button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
<a href="#" class="w3-bar-item w3-button">Log in</a>
<a href="#" class="w3-bar-item w3-button">Registration</a>
<a href="#" class="w3-bar-item w3-button">Add a job offer</a>
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
    


    

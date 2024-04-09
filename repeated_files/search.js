//This is for searching in pages other than the homePage
//Redirection to the homePage and applying search    
    
    // Check if the search parameter is present in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('search');
    
    // If search parameter exists, redirect to homepage with search applied
    if (searchQuery) {
        window.location.href = "../homePage/index.php?search=" + encodeURIComponent(searchQuery);
    }
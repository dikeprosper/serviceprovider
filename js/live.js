const liveServer = false; // Set to true if using Live Server

const path = window.location.pathname.toLowerCase(); // Base URL path for local development

const urlpath = "/work/localproviders/";

if(liveServer) {
    
    // Base URL path for LIVE App
    urlpath = "/";
    
    // Remove trailing slash from all site url except home
    if (path.length > 1 && path.endsWith("/")) {
        path = path.slice(0, -1);
    }
}

const isHomePage = path == urlpath || path == urlpath+"index.php" || path == urlpath+"home";
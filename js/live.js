const liveServer = false; // Set to true if using Live Server

const path = window.location.pathname.toLowerCase(); // Base URL path for local development

const urlpath = "/work/localproviders/";
const siteUrl = document.getElementById("siteUrl").value;


if(liveServer) {
    
    // Base URL path for LIVE App
    urlpath = "/";
    
    // Remove trailing slash from all site url except home
    if (path.length > 1 && path.endsWith("/")) {
        path = path.slice(0, -1);
    }
}

const isHomePage = path == urlpath || path == urlpath+"index.php" || path == urlpath+"home";
const isAboutPage = path == urlpath+"about" || path == urlpath+"about.php";
const isProfilePage = path == urlpath+"profiles" || path == urlpath+"profiles.php";
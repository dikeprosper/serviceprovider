function watchSection(sectionId, sectionVisible, toggleClass) {

    // Get the target section and the element to toggle
    var targetSection = document.getElementById(sectionId);
    var sectionVisible = document.getElementById(sectionVisible);
    
    // Base URL path for local development
    var urlpath = "/work/localproviders/";

    // Get current path
    let path = window.location.pathname.toLowerCase();
    
    let wasVisible = true;
    
    if(liveServer === true) {
        
        // For Live Server
        urlpath = "/";
        
        // Remove trailing slash except root
        if (path.length > 1 && path.endsWith("/")) {
            path = path.slice(0, -1);
        }

    }


    // Check if homepage
    if (
        path !== urlpath &&              // domain.com
        path !== urlpath + "index.php" &&     // domain.com/index.php
        path !== urlpath + "home"          // domain.com/home
    ){
        // If not homepage, make search bar active by default}
        sectionVisible.classList.add(toggleClass);
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {

            // Scrolled past section
            if (!entry.isIntersecting && wasVisible) {
                
                sectionVisible.classList.add(toggleClass);
                wasVisible = false;
            }

            // Back in view
            if (entry.isIntersecting && !wasVisible) {

                sectionVisible.classList.remove(toggleClass);
                wasVisible = true;
            }

        });
    }, {
        threshold: 0
    });

    observer.observe(targetSection);
}

watchSection(

    "searchBar",
    "desktopSearch",
    "searchBarActive"
);


// Display Header banner on scroll

const banner = document.querySelector("header .small-banner");

function navbarAndBanner() {
    
    if(bodyTag.scrollTop > 50) {
    
        banner.classList.add("active");
    } else {
        
        banner.classList.remove("active");
    }

}



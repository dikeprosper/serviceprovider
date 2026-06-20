AOS.init();

function watchSection(sectionId, sectionVisible, toggleClass) {

    // Get the target section and the element to toggle
    var targetSection = document.getElementById(sectionId);
    var sectionVisible = document.getElementById(sectionVisible);
    

    // Get current path
    
    let wasVisible = true;

    // Checking if we aren't on the homepage
    if(!isHomePage) {

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


// Header Banner
const banner = document.querySelector("header .small-banner");

// Profile Page Sidebar Navigation
const sideBar = document.querySelector(".sidebar");

function navbarAndBanner() {

    // Display Header banner on scroll

    if(window.scrollY > 50) {

        banner.classList.add("active");
    } else {
        
        banner.classList.remove("active");
    }


}

if(!isAboutPage && !isHomePage) {
    
    banner.classList.add("d-none");
}


// Feature slider

const track = document.getElementById("track");
const clientFeatures = [
    {item: "Escrow Protection", icon: "verified_user"},
    {item: "Fast Turnaround", icon: "schedule"},
    {item: "Event Reminders", icon: "event"},
    {item: "Secure Payments", icon: "lock"},
    {item: "Saved Measurements", icon: "straighten"},
    {item: "Fabric Recommendations", icon: "checkroom"},
    {item: "Price Transparency", icon: "receipt_long"},
    {item: "Reorder Made Easy", icon: "refresh"},
    {item: "Secure Payments", icon: "lock"},
    {item: "Free ammendments", icon: "content_cut"},
    {item: "Style Inspiration", icon: "auto_awesome"}
];

const providerFeatures = [
  { item: "Get Paid Securely", icon: "payments" },
  { item: "Escrow Protection", icon: "verified_user" },
  { item: "Business Portfolio", icon: "work" },
  { item: "Order Management", icon: "assignment" },
  { item: "Earnings Dashboard", icon: "dashboard" },
  { item: "Promotion Tools", icon: "campaign" },
  { item: "Profile Customization", icon: "tune" },
  { item: "Customer Reviews", icon: "star_rate" },
  { item: "Order Management", icon: "assignment" },
  { item: "Repeat Clients", icon: "people" },
  { item: "Analytics & Insights", icon: "insights" }
];

// Create Featured slidder Icon buttons

function createBtn (feautures) {
    
    track.innerHTML = "";

    for (let i = 0; i <= 10; i++) {
    
        const btn = `<button class="btn feature-btn fs-7 d-flex justify-content-center align-items-center">
                            <span class="bg-${[i]} fs-6 material-symbols-outlined me-2"> ${feautures[i].icon} </span>
                            ${feautures[i].item}
                        </button>`;
    
      track.innerHTML += btn;
    }
}

// Checking if we are on the homepage

if(isHomePage) { 

    createBtn (clientFeatures);
    
    // Duplicate buttons for seamless loop
    const clone = track.innerHTML;
    track.innerHTML += clone;

    let position = 0;
    let speed = 0.5; // adjust speed here
    
    function animate() {
      position -= speed;
    
      // Reset when half scrolled (because we duplicated content)
      if (Math.abs(position) >= track.scrollWidth / 2) {
        position = 0;
      }
    
      track.style.transform = `translateX(${position}px)`;
    
      requestAnimationFrame(animate);
    }
    
    animate();
    
    // Optional: Pause on hover
    
    track.addEventListener("mouseleave", () => speed = 0.5);
    track.addEventListener("mouseenter", () => speed = 0);
}



/* ── Scroll Reveal via IntersectionObserver ── */
(function () {
  const els = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.2 });

  els.forEach(el => io.observe(el));
})();
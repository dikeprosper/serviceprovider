const slider = document.querySelector(".allNavLinks");
const scrollNav = document.querySelectorAll(".scrollNav");
const mobileNav = document.querySelector(".mobile-nav");
const categories = document.querySelector("#categories-link");
const explore = document.querySelector("#explore-link");
const categoriesBack = document.querySelector("#categories-back-link");
const exploreBack = document.querySelector("#explore-back-link");
const navIcon = document.querySelectorAll(".navIcon");
const bodyTag = document.querySelector("body");
const screenWidth = window.innerWidth;


// Adjusting navigation widths for smaller screens

window.addEventListener("resize", () => {
    
    resizeNavigation(window.innerWidth);
});


resizeNavigation(window.innerWidth);

function resizeNavigation(screenWidth) {

    scrollNav.forEach(navBoard => {

        if(screenWidth <= 992){

            navBoard.style.minWidth = `${screenWidth}px`;
            navBoard.style.width = `${screenWidth}px`;
        } else {

            navBoard.style.minWidth = "unset";
            navBoard.style.width = "unset";
        }
    });
}


// Adding event listeners to navigation icons

navIcon.forEach(navMethod => {
    
    navMethod.addEventListener("click", () => {
        mobileNav.classList.toggle("mobile-nav-active");
    });
});


// Adding event listeners to scroll buttons in mobile navigation

explore.addEventListener("click", e => {
    e.preventDefault();
    scrollSlider(2);
});

categories.addEventListener("click", e => {
    e.preventDefault();
    scrollSlider(1);
});

exploreBack.addEventListener("click", e => {
    e.preventDefault();
    scrollBack(2);
});

categoriesBack.addEventListener("click", e => {
    e.preventDefault();
    scrollBack(1);
});


// Functions to handle smooth scrolling in mobile navigation

function scrollSlider(num){

    slider.scrollBy({
        left: window.innerWidth * num,
        behavior: "smooth"
    });
}

function scrollBack(num){

    slider.scrollBy({
        left: -window.innerWidth * num,
        behavior: "smooth"
    });
}

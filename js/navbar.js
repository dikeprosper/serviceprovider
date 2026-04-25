const slider = document.querySelector(".allNavLinks");
const scrollNav = document.querySelectorAll(".scrollNav");
const mobileNav = document.querySelector(".mobile-nav");
const screenWidth = window.innerWidth;
const categories = document.querySelector("#categories-link");
const explore = document.querySelector("#explore-link");
const categoriesBack = document.querySelector("#categories-back-link");
const exploreBack = document.querySelector("#explore-back-link");
const navIcon = document.querySelectorAll(".navIcon");

if(screenWidth <= 992){
    
    scrollNav.forEach(navBoard => {
        navBoard.style.minWidth =  `${screenWidth}px`;
    });
    
}
navIcon.forEach(navMethod => {
    
    navMethod.addEventListener("click", function(){
        mobileNav.classList.toggle("mobile-nav-active");
    });
});


explore.addEventListener("click", function(e){
    e.preventDefault();
    scrollSlider(1);
});

categories.addEventListener("click", function(e){
    e.preventDefault();
    scrollSlider(2);
});

exploreBack.addEventListener("click", function(e){
    e.preventDefault();
    scrollBack(1);
});

categoriesBack.addEventListener("click", function(e){
    e.preventDefault();
    scrollBack(2);
});




function scrollSlider(num){

    slider.scrollBy({
        left: screenWidth * num,
        behavior: "smooth"
    });
}

function scrollBack(num){

    slider.scrollBy({
        left: -screenWidth * num,
        behavior: "smooth"
    });
}

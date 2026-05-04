// Hire and get Hired

const heroContent = document.querySelector(".hero-content");
const hire = document.querySelector("#hire");
const getHired = document.querySelector("#getHired");
const btn = document.querySelectorAll(".switchRole button");

btn.forEach(button => {
    
    button.addEventListener("click", () => {

        if(button.innerHTML === "Hire") {

            hire.classList.remove("inActive");
            getHired.classList.add("inActive");

            heroContent.scrollBy({
                left: -window.innerWidth * 100,
                behavior: "smooth"
            });
            
        } else {
            
            hire.classList.add("inActive");
            getHired.classList.remove("inActive");

            heroContent.scrollBy({
                left: window.innerWidth * 100,
                behavior: "smooth"
            });
        }
    });

});


// Hire and get hired scroller


function scrollSlider(num){

    slider.scrollBy({
        left: window.innerWidth * num,
        behavior: "smooth"
    });
}


resizeHero("100px");

function resizeHero(width) {

}
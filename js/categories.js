let slides = document.querySelectorAll(".hero-slide");
    let index = 0;

    setInterval(() => {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length;
        slides[index].classList.add("active");
    }, 5000);


let modal=document.getElementById('modal');

function openModal(){modal.style.display='flex';reset();}
function closeModal(){modal.style.display='none';}

function reset(){
    document.querySelectorAll('.step').forEach(e=>e.classList.remove('active'));
    document.getElementById('step1').classList.add('active');
}

function nextStep(n){
    document.querySelectorAll('.step').forEach(e=>e.classList.remove('active'));
    document.getElementById('step'+n).classList.add('active');
}

modal.addEventListener('click',e=>{if(e.target===modal)closeModal()});

// ==============================
// MOBILE / TOUCH DRAG SLIDER
// ==============================

document.querySelectorAll('.slider-container').forEach(container => {
    const track = container.querySelector('.slider-track');

    let isDown = false;
    let startX;
    let currentX = 0;
    let animationPaused = false;

    container.addEventListener('pointerdown', (e) => {
        isDown = true;
        startX = e.clientX;
        track.style.animationPlayState = 'paused';
        animationPaused = true;
    });

    container.addEventListener('pointermove', (e) => {
        if (!isDown) return;

        const moveX = e.clientX - startX;
        track.style.transform = `translateX(${currentX + moveX}px)`;
    });

    container.addEventListener('pointerup', (e) => {
        isDown = false;
        const moveX = e.clientX - startX;
        currentX += moveX;

        // resume animation after slight delay
        setTimeout(() => {
            track.style.animationPlayState = 'running';
        }, 200);
    });

    container.addEventListener('pointerleave', () => {
        isDown = false;
        track.style.animationPlayState = 'running';
    });
});
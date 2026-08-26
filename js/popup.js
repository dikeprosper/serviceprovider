// var button = document.getElementById("myBtn");

// button.addEventListener("click", () => {

//     Notification.requestPermission().then(perm => {
//         alert(perm)
//     })
// })

function popup(e,checkBoxId) {

    const checkBox = e.parentElement.querySelector("#" + checkBoxId);
    
    // console.log(checkBox);

    const popup = checkBox.nextElementSibling;

    popup.style.transform = "";
    popup.classList.remove("centernow");


    const rect = e.getBoundingClientRect();
    const distanceFromTop = rect.top; // Space between element's top and viewport top
    const distanceFromBottom = window.innerHeight - rect.bottom;
    const elementHeight = 390;
    
    const touchingTop = distanceFromTop < elementHeight;
    const touchingBottom = distanceFromBottom < elementHeight;


    console.log(touchingTop)
    console.log(touchingBottom);

    if (window.innerWidth < 768){

        checkBox.focus({ preventScroll: true });
        return;
    }

    if (touchingBottom && touchingTop){

        popup.classList.add("centernow");

    } else if (touchingBottom) {

        popup.classList.add("topnow");

    } else if (touchingTop) {
        
        popup.classList.remove("centernow");
        popup.classList.remove("topnow");
    }

    checkBox.focus({ preventScroll: true });
}

var popCcontainer = document.querySelectorAll('.pop-up-container');

popCcontainer.forEach(container => {
    
    
    let myToggler = container.querySelector('.myToggler');
    
    container.addEventListener("click", function(e){

        let clicked = e.target;

        if(clicked.data-id == "focusme") {
            return;
        }

        myToggler.focus();

    });
    
    var closePop = document.querySelectorAll('#closePop');
    
    closePop.forEach(button => {
        
        button.addEventListener("click", function(){
            
            button.parentElement.style.transform = "scale(0)";
        });
    
    });
});


function alertMsg() {
    
    setTimeout(function() {
        

        var el = document.getElementById('appalert');
        
        el.style.top = '80px';
        
        // Track timing for hover pause/resume
        var alertStartTime = Date.now();
        var hideTimeout = null;
        var hideDelay = 5000; // 5 seconds
        
        function scheduleHide() {
            var elapsedTime = Date.now() - alertStartTime;
            var remainingTime = hideDelay - elapsedTime;
            
            if (remainingTime <= 0) {
                // Time has already passed, hide immediately
                hideAlert();
            } else {
                // Schedule hide for remaining time
                hideTimeout = setTimeout(hideAlert, remainingTime);
            }
        }
        
        function hideAlert() {
            el.style.transition = '.8s';
            if(el) {

                el.style.top = '-400px';

                setTimeout(function() { 
                    
                    el.parentElement.style.opacity = '0';
                    el.parentElement.remove();

                }, 100);
            }
        }
        
        // Initial hide schedule
        scheduleHide();
        
        // Pause on hover
        el.addEventListener('mouseenter', function() {
            if (hideTimeout) {
                clearTimeout(hideTimeout);
                hideTimeout = null;
            }
        });
        
        // Resume on mouse leave
        el.addEventListener('mouseleave', function() {
            scheduleHide();
        });
        
        // Click on alert itself - do nothing (stop propagation)
        el.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        // Click on cover - hide alert
        var cover = document.getElementById('cover');
        if (cover) {
            cover.addEventListener('click', function() {
                if (hideTimeout) {
                    clearTimeout(hideTimeout);
                }
                hideAlert();
            });
        }

    }, 150);
}

alertMsg();
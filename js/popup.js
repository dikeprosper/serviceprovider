function popup(e,checkBoxId) {

    // alert(e)
    var checkBox = document.getElementById(checkBoxId);

    // console.log(checkBox);

    const popup = checkBox.nextElementSibling;

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

        checkBox.focus();
        return;
    }

    if (touchingBottom && touchingTop){

        popup.classList.add("centernow");

    } else if (touchingBottom) {

        popup.classList.add("topnow");

    } else if (touchingTop) {
        
        popup.classList.remove("topnow");
    }


    checkBox.focus();
}

var popCcontainer = document.querySelectorAll('.pop-up-container');

popCcontainer.forEach(container => {

    let myToggler = container.querySelector('.myToggler');

    container.addEventListener("click", function(){
        myToggler.focus();
    });

});
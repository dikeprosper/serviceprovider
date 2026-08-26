// // Fabric toggle
const fabricToggle          = document.getElementById('fabric-toggle');
const fabricBox             = document.getElementById('img_box');
const pickTailor            = document.getElementById('pickTailor');
const fabricInput           = document.getElementById('fabricId');

fabricToggle.addEventListener('change', (e) => {
    
    if (e.target.checked) {

        // User has their own Fabrics
        fabricBox.classList.add('is-hidden');
        pickTailor.classList.remove('is-hidden');

    } else {

        // User wants to find a Fabrics
        fabricBox.classList.remove('is-hidden');
        if(fabricInput.value == "") {
            pickTailor.classList.add('is-hidden');
        }

    }

});

// Checkout toggle
const tailorToggle          = document.getElementById('tailor-toggle');
const tailorBox             = document.getElementById('tailor-box');
const checkOut              = document.getElementById('checkOut');
const tailorInput           = document.getElementById('tailorId');

tailorToggle.addEventListener('change', (e) => {
    
    if (e.target.checked) {

        tailorBox.classList.add('is-hidden');
        checkOut.classList.remove('is-hidden');

    } else {

        tailorBox.classList.remove('is-hidden');
        if(tailorInput.value == "") {
            checkOut.classList.add('is-hidden');
        }

    }

});


async function delItem(pid) {

    const formData = new FormData();
    formData.append('delete', pid);

    try {

        const response = await fetch(siteUrl + 'order_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();


        // Update the selected item
        document.querySelector('.selectedItem').innerHTML = result.selectedItem;
        
        // Update the options list
        document.querySelector('.optionsRow').innerHTML = result.list;

        // Update the alert message
        document.getElementById('message').innerHTML = result.alert;
        alertMsg();


    } catch (err) {
        console.log(err)
        alert('Something went wrong. Please try again');
    }
}

async function selectItem(pid) {

    const formData = new FormData();
    formData.append('select', pid);

    try {

        const response = await fetch(siteUrl+'order_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text();
        document.querySelector('.selectedItem').innerHTML = result;


    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
}

async function addFabric(fid, yards_left, total_yards, fab_price) {

    const formData = new FormData();
    formData.append('add_fab', fid);
    formData.append('yards_left', yards_left);
    formData.append('total_yards', total_yards);
    formData.append('fab_price', fab_price);
    alert(total_yards +"_"+ fab_price)
    // try {

    //     const response = await fetch(siteUrl+'order_action.php', {
    //         method: 'POST',
    //         body: formData,
    //     });

    //     const result = await response.text();

    //     if(result != "ORDER ERROR") {

    //         window.location.href = siteUrl + "order";
    //     }


    // } catch (err) {

    //     // This fires if the network failed or PHP returned non-JSON
    //     alert('Something went wrong. Please try again');
    // }
}

async function addTailor(uid) {

    const formData = new FormData();
    formData.append('add_tailor', uid);
    
    try {

        const response = await fetch(siteUrl+'order_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text();

        if(result != "ORDER ERROR") {

            window.location.href = siteUrl + "order";
        }


    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
}
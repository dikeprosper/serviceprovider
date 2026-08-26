let modal = document.querySelector('#modal');
let inputUsername = document.querySelector('#username');
let inputPid = document.querySelector('#pid');
let messageBox = document.getElementById('message');

let errorMsg = document.querySelector('.errorMsg');

// Open modal
async function openModal (id = "", username = "") {

    if(id != "" && username != ""){

        try {
    
            const moodData = new FormData();
            moodData.append('showboard', 'checkPin');
            moodData.append('id', id);
    
            const moodBoard = await fetch(siteUrl+'pin_action.php', {
                method: 'POST',
                body: moodData,
            });
    
            const result2 = await moodBoard.text(); // Expect JSON back from PHP
            modal.querySelector(".row").innerHTML = result2;
        
        } catch (err) {
    
            // This fires if the network failed or PHP returned non-JSON
            alert('Something went wrong.');
            return;
        }
    
        inputUsername.value = username;
        inputPid.value = id;
    }
    
    modal.style.display='flex';
}

// Close modal
function closeModal () {

    inputUsername.value = '';
    inputPid.value = '';
    modal.style.display='none';
}

modal.addEventListener('click',e=>{if(e.target===modal)closeModal()});

// Save pin
async function savePin (moodboard) {

    // alert(`${moodboard} ${inputUsername.value} ${inputPid.value}`)

    const formData = new FormData();
    
    formData.append('save', inputPid.value);
    formData.append('username', inputUsername.value);
    formData.append('moodboard', moodboard);
    
    const moodData = new FormData();
    moodData.append('showboard', 'insert');

    try {

        const response = await fetch(siteUrl+'pin_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text(); // Expect JSON back from PHP
        document.getElementById('message').innerHTML = result;

        closeModal ();
        alertMsg();

        const moodBoard = await fetch(siteUrl+'pin_action.php', {
            method: 'POST',
            body: moodData,
        });

        const result2 = await moodBoard.text(); // Expect JSON back from PHP
        modal.querySelector(".row").innerHTML = result2;


    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
}

// Delete pin
async function deletePin(pid,moodboard,dellAll = "", refresh = null) {
    
    // document.getElementById('message').innerHTML = "";
    const formData = new FormData();
    
    formData.append('delete', pid);
    formData.append('board', moodboard);
    
    if(dellAll != "") {
        formData.append('dellAll', dellAll);
    }
    
    try {

        const response = await fetch(siteUrl+'pin_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text(); // Expect JSON back from PHP
        document.getElementById('message').innerHTML = result;

        alertMsg();

        if (refresh) {

            setTimeout(function() {

                window.location = "";
            }, 1000);
        }

    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
}

if(document.getElementById('message').innerHTML != ''){
    alertMsg();
}

// New board modal
function addBoard(id) {

    var addBoard = document.getElementById(id);
    addBoard.style.height = "190px";
}

// Add new board
async function addNewBoard (skip = null) {

    const newBoardInput = document.getElementById('newBoardInput');
    const formData = new FormData();
    
    formData.append('newBoard', newBoardInput.value);

    if(skip == null) {
        const moodData = new FormData();
        moodData.append('showboard', 'insert');
        moodData.append('id', inputPid.value);
    }

    try {

        const response = await fetch(siteUrl+'pin_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text(); // Expect JSON back from PHP
        document.getElementById('message').innerHTML = result;

        alertMsg();

        if(skip == null) {

            const moodBoard = await fetch(siteUrl+'pin_action.php', {
                method: 'POST',
                body: moodData,
            });
    
            document.getElementById('addBoard').style.height = "0px";
    
            const result2 = await moodBoard.text(); // Expect JSON back from PHP
            modal.querySelector(".row").innerHTML = result2;

        }


    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
    
}

// Update pin
async function updatePin(pid,moodId,noteId) {
    
    const board = document.getElementById(moodId);
    const note = document.getElementById(noteId);
    const formData = new FormData();
    
    formData.append('moodboard', board.value);
    formData.append('note', note.value);
    formData.append('update', pid);


    // alert(moodboard + "_____" + note)
    
    try {

        const response = await fetch(siteUrl+'pin_action.php', {
            method: 'POST',
            body: formData,
        });

        // const result = await response.text(); // Expect JSON back from PHP
        // document.getElementById('message').innerHTML = result;

        alertMsg();

        window.location = "";

    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
}

// Display user measurment size


async function addItem(pid) {
    
    let selectSize = document.querySelector('.measurements:not(.d-none) .selectSize')

    if(selectSize.value == ""){
        errorMsg.innerHTML = "Please select your measurement to continue";
        return;
    }

    var standard = document.getElementById('standard').value;

    const formData = new FormData();
    formData.append('add', pid);
    formData.append('standard', standard);
    formData.append('size', selectSize.value);

    try {

        const response = await fetch(siteUrl+'order_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text();

        if(result == "saved") {

            window.location.href = siteUrl + "order";
        }

        document.getElementById('message').innerHTML = result;
        alertMsg();

    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
}

// Measurement toggle
const measurementToggle = document.getElementById('measurement-toggle');
const measurementBox   = document.getElementById('measurement-box');
const standardMeasurementBox = document.getElementById('standard-measurement');
const standardInput = document.getElementById('standard');

measurementToggle.addEventListener('change', (e) => {

    if (e.target.checked) {

        // User wants to upload their own measurements
        measurementBox.classList.remove('d-none');
        standardMeasurementBox.classList.add('d-none');
        standardInput.value = 0;

    } else {

        // User wants to use standard measurements
        measurementBox.classList.add('d-none');
        standardMeasurementBox.classList.remove('d-none');
        standardInput.value = 1;
    }
});

// https://web.facebook.com/share/r/18p6tMfvfP/
//https://web.facebook.com/share/r/1BZDvySJHJ/
// https://web.facebook.com/share/r/19EjpzbYCk/
//https://web.facebook.com/share/r/19GKX3MKAT/
//https://web.facebook.com/share/r/19LvvMW1TY/
// https://web.facebook.com/share/r/18gFcC8mbT/
// https://web.facebook.com/share/r/1CveJiofAR/
// https://web.facebook.com/reel/1561353502149102
// https://web.facebook.com/share/r/18zDsLurX3/
// https://web.facebook.com/reel/992743427114822
// https://web.facebook.com/share/r/1JGafAxFRJ/
// https://web.facebook.com/share/r/1C4zxh6SRw/
// https://web.facebook.com/share/v/1Ypz1jXdfc/
let modal = document.querySelector('#modal');
let inputUsername = document.querySelector('#username');
let inputPid = document.querySelector('#pid');
let messageBox = document.getElementById('message');

async function openModal (id, username) {

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
    modal.style.display='flex';
}

function closeModal () {

    inputUsername.value = '';
    inputPid.value = '';
    modal.style.display='none';
}

modal.addEventListener('click',e=>{if(e.target===modal)closeModal()});

async function savePin (moodboard) {

    // alert(`${moodboard} ${inputUsername.value} ${inputPid.value}`)

    const formData = new FormData();
    
    formData.append('pid', inputPid.value);
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

async function deletePin(pid,moodboard) {
    
    const formData = new FormData();
    
    formData.append('delete', pid);
    formData.append('board', moodboard);
    
    try {

        const response = await fetch(siteUrl+'pin_action.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.text(); // Expect JSON back from PHP
        document.getElementById('message').innerHTML = result;

        alertMsg();

    } catch (err) {

        // This fires if the network failed or PHP returned non-JSON
        alert('Something went wrong. Please try again');
    }
}

if(document.getElementById('message').innerHTML != ''){
    alertMsg();
}
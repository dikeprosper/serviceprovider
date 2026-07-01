// Finish registration
const firstStep = document.querySelector('#firstStep');
const lastStep = document.querySelector('#lastStep');
lastStep.style.display = 'none';
const registration = document.querySelector('#registration');

const emailValidate = document.querySelector('.emailValidate');
const passwordValidate = document.querySelector('.passwordValidate');
const usernameValidate = document.querySelector('.usernameValidate');
const username = document.querySelector('#username');

// username.addEventListener("input", function () {

//     username.value = username.value.replaceAll(" ", "_");
// })


async function submitForm() {
    
    var error = 0;

    // Validate email
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');

    emailValidate.classList.remove(`error-0`, `error-1`);
    passwordValidate.classList.remove(`error-0`, `error-1`);
    usernameValidate.classList.remove(`error-0`, `error-1`);

    if(/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)){

        const regData = new FormData();
        regData.append('validateUser', '1');
        regData.append('email', email.value);


        
        const emailValid = await fetch(siteUrl+'user_action.php', {
            method: 'POST',
            body: regData,
        })
        .then(response => response.json())
        .then(data => {

            // Update the email validation message
            emailValidate.classList.add(`error-${data.errorNum}`);
            emailValidate.innerHTML = data.msg;
    
        })
        .catch(error => {

            emailValidate.classList.add('error-1');
            alert('Error: Please try again later'+error);

        });


    } else {

        emailValidate.classList.add('error-1');
        emailValidate.innerHTML = "Not an email";
    }

    if(emailValidate.innerHTML != "Looks good"){
        error = 1;
    }

    // Validate password
    if(password.value.length < 6){

        passwordValidate.classList.add('error-1');
        passwordValidate.innerHTML = "Password must be at least 6 characters";
        error += 1;

    } else {

        passwordValidate.classList.add('error-0');
        passwordValidate.innerHTML = "Looks good";
    }
    
    // If there are no errors, show the last step
    
    // Validate username
    if(username.value.length < 5){
        
        usernameValidate.classList.add('error-1');
        
        if(lastStep.style.display == 'none' && error == 0){

            firstStep.style.display = 'none';
            lastStep.style.display = 'block';

        } else {
            
            usernameValidate.innerHTML = "Username must be at least 5 characters";
        }

        error += 1;

    } else {

        const userData = new FormData();
        userData.append('username', username.value);

        const userValid = await fetch(siteUrl+'user_action.php', {
            method: 'POST',
            body: userData,
        })
        .then(response => response.json())
        .then(data => {
        
            // Update the username validation message
            usernameValidate.classList.add(`error-${data.errorNum}`);
            usernameValidate.innerHTML = data.msg;
        
        })
        .catch(error => {
        
            usernameValidate.classList.add('error-1');
            alert('Error: Please try again later'+error);
        
        });
    }

    // If there are no errors, submit our registration form

    if(usernameValidate.innerHTML != "Looks good"){
        error = 1;
    }

    if(error == 0){
        registration.submit();
    }
}

registration.addEventListener('submit', (e) => {
    e.preventDefault();
});

registration.addEventListener('submit', submitForm);
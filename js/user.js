// ===== DOM References =====
const registration = document.querySelector('#registration');
const firstStep = document.querySelector('#firstStep');
const lastStep = document.querySelector('#lastStep');

const email = document.querySelector('#email');
const password = document.querySelector('#password');
const username = document.querySelector('#username');

const emailValidate = document.querySelector('.emailValidate');
const passwordValidate = document.querySelector('.passwordValidate');
const usernameValidate = document.querySelector('.usernameValidate');

lastStep.style.display = 'none';

// ===== Username input formatting =====
username.addEventListener('input', () => {
    username.value = username.value.replaceAll(' ', '_');

    if (username.value.length > 12) {
        username.value = username.value.slice(0, -1); // remove only the last character
        setValidationState(usernameValidate, 1, 'Username cannot be more than 12 characters.');
        return;
    }

    if (username.value.length < 5) {
        setValidationState(usernameValidate, 1, 'Username must be at least 5 characters');
        return;
    }

    // Clear the error once they're back under the limit
    setValidationState(usernameValidate, 0, '');
});

// ===== Helpers =====

function setValidationState(el, errorNum, message) {
    el.classList.remove('error-0', 'error-1');
    el.classList.add(`error-${errorNum}`);
    if (message !== undefined) el.innerHTML = message;
}

function resetValidationStates() {
    [emailValidate, passwordValidate, usernameValidate].forEach(el => {
        el.classList.remove('error-0', 'error-1');
    });
}

function isValidEmailFormat(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
}

async function checkServerValidation(payload) {
    const formData = new FormData();
    Object.entries(payload).forEach(([key, value]) => formData.append(key, value));

    try {
        const response = await fetch(siteUrl + 'user_action.php', {
            method: 'POST',
            body: formData,
        });
        return await response.json(); // { errorNum, msg }
    } catch (error) {
        alert('Error: Please try again later ' + error);
        return { errorNum: 1, msg: 'Please try again later' };
    }
}

// ===== Field validators =====

async function validateEmail() {
    if (!isValidEmailFormat(email.value)) {
        setValidationState(emailValidate, 1, 'Not an email');
        return false;
    }

    const data = await checkServerValidation({ validateUser: '1', email: email.value });
    setValidationState(emailValidate, data.errorNum, data.msg);
    return data.msg === 'Looks good';
}

function validatePassword() {
    if (password.value.length < 6) {
        setValidationState(passwordValidate, 1, 'Password must be at least 6 characters');
        return false;
    }

    setValidationState(passwordValidate, 0, 'Looks good');
    return true;
}

async function validateUsername() {
    if (username.value.length < 5) {
        setValidationState(usernameValidate, 1, 'Username must be at least 5 characters');
        return false;
    }

    const data = await checkServerValidation({ username: username.value });
    setValidationState(usernameValidate, data.errorNum, data.msg);
    return data.msg === 'Looks good';
}

// ===== Step navigation =====
// If step 1 (email + password) passes but username is too short,
// advance to step 2 instead of showing an error immediately.

function goToLastStep() {
    firstStep.style.display = 'none';
    lastStep.style.display = 'block';
}

// ===== Main submit handler =====

async function submitForm() {
    resetValidationStates();

    const emailOk = await validateEmail();
    const passwordOk = validatePassword();
    const step1Ok = emailOk && passwordOk;

    const usernameTooShort = username.value.length < 5;

    if (usernameTooShort && lastStep.style.display === 'none' && step1Ok) {
        // Step 1 passed, username not filled in yet -> move to step 2
        goToLastStep();
        return;
    }

    const usernameOk = await validateUsername();

    if (step1Ok && usernameOk) {
        registration.submit();
    }
}

// ===== Form submit binding =====

registration.addEventListener('submit', (e) => {
    e.preventDefault();
    submitForm();
});
const patterns = {
    fullName: /^[a-zA-Z\s]{3,50}$/,
    username: /^[a-zA-Z0-9_]{3,20}$/,
    email:    /^[\w.+-]+@[\w-]+\.[a-zA-Z]{2,}$/,
    password: /^(?=.*[A-Z])(?=.*\d).{8,}$/
};

const errorMessages = {
    fullName: 'Only letters and spaces, 3–50 characters.',
    username: 'Letters, numbers, underscores only. 3–20 characters.',
    email:    'Enter a valid email (e.g. you@example.com).',
    password: 'Min 8 characters, at least 1 uppercase and 1 number.'
};

function showError(fieldId, message) {
    const input = document.getElementById(fieldId);
    const el = document.getElementById(fieldId + 'Error');
    if (input) {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }
    if (el) el.textContent = message;
}

function clearError(fieldId) {
    const input = document.getElementById(fieldId);
    const el    = document.getElementById(fieldId + 'Error');
    if (input) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }
    if (el) el.textContent = '';
}

function validateField(fieldId, pattern) {
    const input = document.getElementById(fieldId);
    if (!input) return;

    input.addEventListener('input', () => {
        if (input.value.trim() === '') {
            input.classList.remove('is-valid', 'is-invalid');
            const el = document.getElementById(fieldId + 'Error');
            if (el) el.textContent = '';
        } else if (!pattern.test(input.value)) {
            showError(fieldId, errorMessages[fieldId]);
        } else {
            clearError(fieldId);
        }
    });
}
validateField('fullName', patterns.fullName);
validateField('username', patterns.username);
validateField('email',    patterns.email);
validateField('password', patterns.password);

const password        = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');

if (confirmPassword) {
    confirmPassword.addEventListener('input', () => {
        if (confirmPassword.value === '') {
            confirmPassword.classList.remove('is-valid', 'is-invalid');
            document.getElementById('confirmPasswordError').textContent = '';
        } else if (confirmPassword.value !== password.value) {
            showError('confirmPassword', 'Passwords do not match.');
        } else {
            clearError('confirmPassword');
        }
    });
}

const registerForm = document.getElementById('registerForm');
if (registerForm) {
    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const fullName        = document.getElementById('fullName');
        const username        = document.getElementById('username');
        const email           = document.getElementById('email');
        const terms           = document.getElementById('terms');

        let valid = true;

        if (!patterns.fullName.test(fullName.value.trim())) {
            showError('fullName', errorMessages.fullName);
            valid = false;
        } else {
            clearError('fullName');
        }
        if (!patterns.username.test(username.value.trim())) {
            showError('username', errorMessages.username);
            valid = false;
        } else {
            clearError('username');
        }

        if (!patterns.email.test(email.value.trim())) {
            showError('email', errorMessages.email);
            valid = false;
        } else {
            clearError('email');
        }
        if (!patterns.password.test(password.value)) {
            showError('password', errorMessages.password);
            valid = false;
        } else {
            clearError('password');
        }
        if (confirmPassword.value !== password.value) {
            showError('confirmPassword', 'Passwords do not match.');
            valid = false;
        } else {
            clearError('confirmPassword');
        }
        if (!terms.checked) {
            terms.classList.add('is-invalid');
            valid = false;
        } else {
            terms.classList.remove('is-invalid');
        }
        if (valid) {
            registerForm.submit();
        }
    });
}

const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const loginEmail = document.getElementById('loginEmail');
        const loginPass  = document.getElementById('loginPassword');
        let valid = true;
        if (!patterns.email.test(loginEmail.value.trim())) {
            showError('loginEmail', 'Enter a valid email address.');
            valid = false;
        } else {
            clearError('loginEmail');
        }

        if (loginPass.value.trim() === '') {
            showError('loginPassword', 'Password cannot be empty.');
            valid = false;
        } else {
            clearError('loginPassword');
        }
        if (valid) {
            loginForm.submit();
        }
    });
}
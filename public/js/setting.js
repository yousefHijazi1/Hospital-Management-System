const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPass');
const registerButton = document.getElementById('registerButton');
const errorText = document.getElementById('errorText');

function checkPasswordMatch() {
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;

    if (password !== confirmPassword) {
        registerButton.disabled = true;
        errorText.style.color = 'red';
        errorText.textContent = 'Password not match';
    } else {
        registerButton.disabled = false;
        errorText.style.color = 'transparent';
        errorText.textContent = '';
    }
}

passwordInput.addEventListener('input', checkPasswordMatch);
confirmPasswordInput.addEventListener('input', checkPasswordMatch);

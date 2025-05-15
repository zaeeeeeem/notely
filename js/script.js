//  Basic JavaScript - you can add more interactivity here  */

// Example:  Simple validation (you should do proper validation on the server-side with PHP)
document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', (event) => {
            let hasErrors = false;
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            if (!nameInput.value.trim()) {
                setError(nameInput, 'Name is required');
                hasErrors = true;
            } else {
                clearError(nameInput);
            }

            if (!emailInput.value.trim()) {
                setError(emailInput, 'Email is required');
                hasErrors = true;
            } else if (!isValidEmail(emailInput.value.trim())) {
                setError(emailInput, 'Invalid email format');
                hasErrors = true;
            } else {
                clearError(emailInput);
            }

            if (!passwordInput.value.trim()) {
                setError(passwordInput, 'Password is required');
                hasErrors = true;
            } else if (passwordInput.value.length < 6) {
                setError(passwordInput, 'Password must be at least 6 characters');
                hasErrors = true;
            } else {
                clearError(passwordInput);
            }

            if (hasErrors) {
                event.preventDefault(); // Prevent form submission if there are errors
            }
        });
    }

    function setError(inputElement, errorMessage) {
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error';
        errorSpan.textContent = errorMessage;
        inputElement.parentElement.appendChild(errorSpan);
        inputElement.classList.add('error-input'); // You might want to add a CSS class
    }

    function clearError(inputElement) {
        const errorSpan = inputElement.parentElement.querySelector('.error');
        if (errorSpan) {
            errorSpan.remove();
        }
        inputElement.classList.remove('error-input');
    }

    function isValidEmail(email) {
        // Basic email validation (you can use a more robust regex)
        return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);
    }
});

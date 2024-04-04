document.addEventListener('DOMContentLoaded', function () {
    const signupForm = document.getElementById('signup-form');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');

    signupForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const fullName = fullNameInput.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        const fullNameRegex = /^[a-zA-Z\s]+$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let error = "";

        if (!fullNameRegex.test(fullName)) {
            error += "Please enter a valid full name.\n";
        }

        if (!emailRegex.test(email)) {
            error += "Please enter a valid email address.\n";
        }

        if (password.length < 8) {
            error += "Password must be at least 8 characters.\n";
        }

        if (password !== confirmPassword) {
            error += "Passwords do not match.\n";
        }

        if (error !== "") {
            alert(error);
            return;
        }

        // If all validations pass, send POST request
        const formData = {
            fullName: fullName,
            email: email,
            password: password
        };

        fetch('YOUR_API_ENDPOINT', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to create account. Please try again later.');
            }
            return response.json();
        })
        .then(data => {
            // Redirect to dashboard if successful
            window.location.href = 'dashboard.html';
        })
        .catch(error => {
            alert(error.message);
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const errorMessage = document.getElementById('error-message'); 

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const firstName = document.getElementById('firstName').value;
        const secondName = document.getElementById('secondName').value;
        const email = document.getElementById('email').value;
        const phoneNo = document.getElementById('phoneNo').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (!validatePhoneNumber(phoneNo)) {
            errorMessage.innerHTML = 'Please enter a valid phone number.';
            return;
        }

        if (!validatePassword(password, confirmPassword)) {
            errorMessage.innerHTML = 'Please enter a strong password and ensure passwords match.';
            return;
        }

        if (!validateFirstname(firstName) || !validateFirstname(secondName)) {
            errorMessage.innerHTML = 'Enter valid names without numbers.';
            return;
        }

        const fullName = firstName + ' ' + secondName;
        errorMessage.innerHTML = ''; // Clear error message
        alert('Account has been created  successfully for ' + fullName);
        window.location.href = 'home.html';
    });
});

function validatePhoneNumber(phoneNumber) {
    return /^\d{10}$/.test(phoneNumber);
}

function validateEmail(email) {
    return /\s/.test(email);
}

function validateFirstname(firstName) {
    return !/\d/.test(firstName);
}

function validatePassword(password, confirmPassword) {
    const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!strongPasswordRegex.test(password)) {
        return false;
    }

    if (password !== confirmPassword) {
        return false;
    }

    return true;
}

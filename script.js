document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            console.log('Login attempt:', { username, password });
            alert('Login submitted! (Demo mode - check console)');
        });
    }

    if (signupForm) {
        signupForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = {
                fullname: document.getElementById('fullname').value,
                email: document.getElementById('email').value,
                username: document.getElementById('username').value,
                password: document.getElementById('password').value
            };
            
            console.log('Signup attempt:', formData);
            alert('Signup submitted! (Demo mode - check console)');
        });
    }
});

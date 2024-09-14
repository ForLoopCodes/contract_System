// // scripts.js

// document.getElementById('authForm').addEventListener('submit', function(e) {
//     e.preventDefault();

//     const role = document.getElementById('role').value;
//     const email = document.getElementById('email').value.trim();
//     const password = document.getElementById('password').value;

//     const formMessage = document.getElementById('formMessage');

//     if (!email || !password || !role) {
//         formMessage.textContent = "Please fill out all required fields.";
//         formMessage.style.color = "#dc3545";
//         return;
//     }

//     // Redirect based on selected role
//     if (role === 'farmer') {
//         window.location.href = 'farmer-dashboard.html';
//     } else if (role === 'buyer') {
//         window.location.href = 'buyer-dashboard.html';
//     }
// });

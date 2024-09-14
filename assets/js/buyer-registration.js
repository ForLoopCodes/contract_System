document.getElementById('buyerRegisterForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    // Get form values
    const companyName = document.getElementById('company-name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const phone = document.getElementById('phone').value.trim();
    const address = document.getElementById('address').value.trim();
    // const businessType = document.getElementById('business-type').value;

    // Validate form
    if (!companyName || !email || !password || !confirmPassword || !phone || !address ) {
        alert('Please fill out all fields.');
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return;
    }

    // If validation passes, redirect to buyer dashboard
    window.location.href = 'buyer-dashboard.html';
});

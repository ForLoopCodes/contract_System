document.getElementById('contractForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Form validation
    let category = document.getElementById('category').value;
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    let quantity = document.getElementById('quantity').value;
    let mobile = document.getElementById('mobile').value;

    if (!category || !title || !description || !quantity || !mobile) {
        alert('Please fill out all required fields.');
        return;
    }

    // Mobile number validation
    const mobileRegex = /^[6-9]\d{9}$/;
    if (!mobileRegex.test(mobile)) {
        alert('Please enter a valid mobile number.');
        return;
    }

    // Redirect after successful submission
    alert('Form submitted successfully.');
    window.location.href = 'farmer-dashboard.html'; // Redirect to farmer dashboard
});

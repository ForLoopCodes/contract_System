<?php
// Database connection
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "farmingsystem"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variables for messages and contract ID
$message = "";
$contractId = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $contractId = $_POST['contract-id'];
    $amount = $_POST['amount'];
    $paymentDetails = $_POST['payment-details'];

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO payment (id, amount, paymentDetail) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $contractId, $amount, $paymentDetails);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Payment has been recorded successfully.";

        // Set the contract ID in a cookie (valid for 30 days)
        setcookie("contract_id", $contractId, time() + 240, "/");
        // -240= -4 min
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// If the cookie exists, pre-fill the contract ID
if (isset($_COOKIE['contract_id'])) {
    $contractId = $_COOKIE['contract_id'];
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../css/payment.css">
</head>
<body>

<section id="payment">
    <div class="payment-container">
        <h2>Make a Payment</h2>

        <!-- Display message for payment success/error -->
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Payment form -->
        <form id="paymentForm" method="POST" action="">
            <label for="contract-id">Contract ID</label>
            <input type="text" id="contract-id" name="contract-id" required value="<?php echo isset($contractId) ? $contractId : ''; ?>">

            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" required placeholder="Enter amount">

            <label for="payment-details">Payment Details</label>
            <textarea id="payment-details" name="payment-details" placeholder="Enter your payment details here..." required></textarea>

            <button type="submit">Pay Now</button>
        </form>
    </div>
</section>

</body>
</html>

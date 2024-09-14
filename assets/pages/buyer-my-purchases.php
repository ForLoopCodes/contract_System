<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for product data and message
$productData = [];
$message = "";

// Check if the contract_id cookie exists
if (isset($_COOKIE['contract_id'])) {
    $contractId = $_COOKIE['contract_id'];

    // Prepare SQL query to fetch product details based on contract ID
    $stmt = $conn->prepare("SELECT productName, description, ItemQuantity, quantityType, ExpectedPrice, PriceType, MobileNumber, Address, State, District, `Sub District`, Village FROM products WHERE id = ?");
    $stmt->bind_param("i", $contractId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a product with the contract ID exists
    if ($result->num_rows > 0) {
        $productData = $result->fetch_assoc();
    } else {
        $message = "No Purchase found";
    }

    // Close the statement
    $stmt->close();
} else {
    $message = "No Purchase Avalible !!.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Purchases</title>
    <link rel="stylesheet" href="../css/buyer-my-purchases.css">
</head>
<body>
    <div class="container">
        <h1>My Purchases</h1>

        <!-- Display product information if available -->
        <?php if (!empty($productData)): ?>
            <div class="purchase-card">
                <h2><?php echo $productData['productName']; ?></h2>
                <p><strong>Description:</strong> <?php echo $productData['description']; ?></p>
                <p><strong>Quantity:</strong> <?php echo $productData['ItemQuantity'] . ' ' . $productData['quantityType']; ?></p>
                <p><strong>Expected Price:</strong> <?php echo $productData['ExpectedPrice'] . ' ' . $productData['PriceType']; ?></p>
                <p><strong>Mobile Number:</strong> <?php echo $productData['MobileNumber']; ?></p>
                <p><strong>Address:</strong> <?php echo $productData['Address'] . ', ' . $productData['Village'] . ', ' . $productData['Sub District'] . ', ' . $productData['District'] . ', ' . $productData['State']; ?></p>
            </div>
        <?php elseif (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php else: ?>
            <p>No product information available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
 
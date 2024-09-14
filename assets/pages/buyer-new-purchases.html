<?php
// Connect to the database
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "farmingsystem"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    header("Location: payment.php");
    exit();
}

// Fetch data from the products table for displaying available products
$sql = "SELECT id, productName, description, ItemQuantity, quantityType, ExpectedPrice, PriceType, MobileNumber, Address, State, District, `Sub District`, Village FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/buyer-new-purchases.css">
    <title>Available Products</title>
</head>

<body>
    <div class="container">
        <h1>Available Products</h1>
        <div class="contract-list" id="contractList">
            <?php
            // Check if there are results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="contract">';
                    echo '<h2>' . htmlspecialchars($row["productName"]) . '</h2>';
                    echo '<p><strong>Product ID:</strong> ' . htmlspecialchars($row["id"]) . '</p>'; // Display product id
                    echo '<p><strong>Description:</strong> ' . htmlspecialchars($row["description"]) . '</p>';
                    echo '<p><strong>Quantity:</strong> ' . htmlspecialchars($row["ItemQuantity"]) . ' ' . htmlspecialchars($row["quantityType"]) . '</p>';
                    echo '<p><strong>Expected Price:</strong> ' . htmlspecialchars($row["ExpectedPrice"]) . ' ' . htmlspecialchars($row["PriceType"]) . '</p>';
                    echo '<p><strong>Mobile Number:</strong> ' . htmlspecialchars($row["MobileNumber"]) . '</p>';
                    echo '<p><strong>Address:</strong> ' . htmlspecialchars($row["Village"]) . ', ' . htmlspecialchars($row["Sub District"]) . ', ' . htmlspecialchars($row["District"]) . ', ' . htmlspecialchars($row["State"]) . '</p>';
                    
                    // Add Purchase button form using the product id
                    echo '<form method="POST" action="">'; // Redirects to another page
                    echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row["id"]) . '">'; // Use product id
                    echo '<button type="submit">Purchase</button>';
                    echo '</form>';

                    echo '</div>';
                }
            } else {
                echo "<p style='color: red;'>No Products available at the moment.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>

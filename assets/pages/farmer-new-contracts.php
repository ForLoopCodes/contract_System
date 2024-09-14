<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "farmingsystem"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Collect the form data
$productName = $_POST['title']; $description = $_POST['description'];
$itemQuantity = $_POST['quantity']; $expectedPrice = $_POST['expected-price'];
$mobileNumber = $_POST['mobile']; $address = $_POST['address']; $state =
$_POST['state']; $district = $_POST['district']; $subDistrict =
$_POST['sub-district']; $village = $_POST['village']; $quantityType = "kg";
$priceType = "per-20kg"; $stmt = $conn->prepare("INSERT INTO products
(productName, description, ItemQuantity, quantityType, ExpectedPrice, PriceType,
MobileNumber, Address, State, District, `Sub District`, Village) VALUES (?, ?,
?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); $stmt->bind_param("ssisssssssss", $productName,
$description, $itemQuantity, $quantityType, $expectedPrice, $priceType,
$mobileNumber, $address, $state, $district, $subDistrict, $village); if
($stmt->execute()) { echo "
<p style="color: green">New product added successfully!</p>
"; } else { echo "Error: " . $stmt->error; } $stmt->close(); $conn->close(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Contracts</title>
    <link rel="stylesheet" href="../css/farmer-new-contracts.css" />
  </head>

  <body>
    <div class="container">
      <div class="form-container">
        <h2>Add a New Product</h2>
        <form
          id="contractForm"
          method="POST"
          action="<?php echo $_SERVER['PHP_SELF']; ?>"
        >
          <label for="title">Product Name</label>
          <input
            type="text"
            id="title"
            name="title"
            placeholder="Product Name"
            required
          />

          <label for="description">Description</label>
          <textarea
            id="description"
            name="description"
            placeholder="Describe your contract..."
            required
          ></textarea>
          <div class="grid-2">
            <div>
              <label for="quantity">Item Quantity</label>
              <input
                type="number"
                id="quantity"
                name="quantity"
                placeholder="Enter quantity"
                required
              />
            </div>
            <div>
              <label for="expected-price">Expected Price</label>
              <input
                type="number"
                id="expected-price"
                name="expected-price"
                placeholder="Enter price"
                required
              />
            </div>
          </div>
          <label for="mobile">Mobile Number</label>
          <input
            type="tel"
            id="mobile"
            name="mobile"
            placeholder="Enter your mobile number"
            required
          />

          <label for="address">Address</label>
          <textarea
            id="address"
            name="address"
            placeholder="Enter your address"
            required
          ></textarea>
          <div class="grid-2">
            <div>
              <label for="state">State</label>
              <input
                type="text"
                id="state"
                name="state"
                placeholder="Enter state"
                required
              />
            </div>
            <div>
              <label for="district">District</label>
              <input
                type="text"
                id="district"
                name="district"
                placeholder="Enter district"
                required
              />
            </div>
          </div>
          <div class="grid-2">
            <div>
              <label for="sub-district">Sub District</label>
              <input
                type="text"
                id="sub-district"
                name="sub-district"
                placeholder="Enter sub district"
                required
              />
            </div>
            <div>
              <label for="village">Village</label>
              <input
                type="text"
                id="village"
                name="village"
                placeholder="Enter village"
                required
              />
            </div>
          </div>
          <button type="submit" class="btn" id="submit-btn">
            Create Contract
          </button>
        </form>
      </div>
    </div>
  </body>
</html>

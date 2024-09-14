<?php
// Start the session at the beginning of the file
session_start();

// Database connection details
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "farmingsystem"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
// If form is submitted if ($_SERVER['REQUEST_METHOD'] == 'POST') { $email =
$_POST['email']; $password = $_POST['password']; // The password entered by the
user $role = strtolower($_POST['role']); // Convert role to lowercase for
case-insensitive comparison // Check if role is farmer if ($role == 'farmer') {
// Query to check if farmer exists based on email only (no password comparison
in the query) $sql = "SELECT * FROM `farmer ragistation` WHERE `Email` = ?";
$stmt = $conn->prepare($sql); $stmt->bind_param("s", $email); $stmt->execute();
$result = $stmt->get_result(); if ($result->num_rows > 0) { $user =
$result->fetch_assoc(); // No password verification, log the user in directly
$_SESSION['user_id'] = $user['id']; $_SESSION['name'] = $user['Name']; //
Redirect to the home page (farmer dashboard) header("Location:
farmer-dashboard.html"); exit(); // Ensure that no more code is executed } else
{ echo "
<p style="color: red">No account found with this email!</p>
"; } } else if ($role == 'buyer') { // Query to check if buyer exists based on
email only (no password comparison in the query) $sql = "SELECT * FROM
`buyer_registration` WHERE `Email` = ?"; $stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); $stmt->execute(); $result = $stmt->get_result();
if ($result->num_rows > 0) { $user = $result->fetch_assoc(); // No password
verification, log the user in directly $_SESSION['user_id'] = $user['id'];
$_SESSION['name'] = $user['Company Name']; // Redirect to the home page
(index.html) header("Location: buyer-dashboard.html"); exit(); // Ensure that no
more code is executed } else { echo "
<p style="color: red">No account found!</p>
"; } } } // Close the connection $conn->close(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login/Signup</title>
    <link rel="stylesheet" href="../css/login.css" />
  </head>

  <body>
    <div class="auth-container">
      <h2>Login / Signup</h2>

      <div class="form-container">
        <form id="authForm" action="" method="POST">
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Enter your email"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              required
            />
          </div>

          <div class="form-group">
            <label for="role">Select Role</label>
            <select id="role" name="role" required>
              <option value="" disabled selected>Select your role</option>
              <option value="farmer">Farmer</option>
              <option value="buyer">Buyer</option>
            </select>
          </div>
          <button type="submit">Login</button>
          <p id="formMessage"></p>
        </form>

        <div class="register">
          <p>
            Don't have an account? <br />
            <div class="signup-links"">
            <a href="./farmer-registar.php">Farmer Signup</a> <br />
            <a href="./buyer-registar.php">Buyer Signup</a>
            </div>
          </p>
        </div>
      </div>
    </div>
    <script src="../js/login.js"></script>
  </body>
</html>

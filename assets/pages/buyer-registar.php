<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmingsystem";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $company_name = $_POST['company-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    if ($password !== $confirm_password) {
        echo "<p style='color: red;'>Passwords do not match!</p>";
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO `buyer_registration` (`Company Name`, `Email`, `Password`, `Phone Number`, `Address`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $company_name, $email, $hashed_password, $phone, $address);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Registration successful!</p>";

            header("Location: login.php");

        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }


        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Registration</title>
    <link rel="stylesheet" href="../css/registration.css">
</head>

<body>
    <div class="form-container">
        <h2>Buyer Registration</h2>
        <form id="buyerRegisterForm" action="" method="POST">
            <label for="company-name">Company Name</label>
            <input type="text" id="company-name" name="company-name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" required></textarea>

            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>
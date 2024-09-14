<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Registration</title>
    <link rel="stylesheet" href="../css/registration.css">
</head>
<body>
    <div class="form-container">
        <h2>Farmer Registration</h2>

        <?php
        // Check if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Database connection details
            $servername = "localhost"; // Your server name
            $username = "root"; // Your database username
            $password = ""; // Your database password
            $dbname = "farmingsystem"; // Your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm-password'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            // Validate password match
            if ($password !== $confirm_password) {
                echo "<p style='color: red;'>Passwords do not match!</p>";
            } else {
                // Hash the password for security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data into the `farmer ragistation` table
                $sql = "INSERT INTO `farmer ragistation` (`Name`, `Email`, `Password`, `conformPassword`, `Phone Number`, `Address`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $name, $email, $hashed_password, $hashed_password, $phone, $address);

                if ($stmt->execute()) {
                    echo "<p style='color: green;'>Registration successful!</p>";
                    header("Location: login.php");
                } else {
                    echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }

                $stmt->close();
            }

            $conn->close();
        }
        ?>

        <form id="registerForm" action="" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

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

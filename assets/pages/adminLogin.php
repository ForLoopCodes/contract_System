<?php

session_start();

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "farmingsystem";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginSuccess = false;
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['password'] === $password) {

            $_SESSION['admin'] = $username;
            $loginSuccess = true;


            header("Location: admin-dashboard.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Username does not exist.";
    }


    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/adminLogin.css">
</head>

<body>

    <div class="login-container">
        <h2>Admin Login</h2>

        <?php if ($loginSuccess): ?>

        <?php else: ?>

            <?php if ($error): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

        <?php endif; ?>
    </div>

</body>

</html>
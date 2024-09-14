<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "farmingsystem"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM `contact`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>
<body>
    <h2>Contact Records</h2>

    <div class="card-container">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row as a card
            while($row = $result->fetch_assoc()) {
                echo "
                <div class='card'>
                    <h3>" . $row["name"] . "</h3>
                    <p><strong>Email:</strong> " . $row["Email"] . "</p>
                    <p><strong>Subject:</strong> " . $row["Subject"] . "</p>
                    <p><strong>Message:</strong> " . $row["Message"] . "</p>
                </div>";
            }
        } else {
            echo "<h4 style='color : red' class='no-records'>No records found</h4>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>

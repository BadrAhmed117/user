<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "ma3rad");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user's information
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["fname"];
    $status = $row["status"];
    $additional_info = $row["additional_info"]; // Assuming you have an 'additional_info' column in your 'users' table
} else {
    echo "No user found.";
    exit;
}

// Display the user's information
echo "<h2>User Information</h2>";
echo "Name: " . $name . "<br>";
echo "Status: " . $status . "<br>";
echo "Additional Info: " . $additional_info . "<br>";
?>
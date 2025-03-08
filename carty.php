<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "demo";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT SUM(Item_Cost) AS total_cost FROM book"; // Alias the sum to make it easier to access

$result = $conn->query($query);
if ($result) {
    $row = $result->fetch_assoc();
    $totalCost = $row['total_cost']; // Access the sum using the alias
    
    echo "<p>Total Cost is : $totalCost</p>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

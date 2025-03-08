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

$name= $_POST['name'];
$count= (int)$_POST['count'];
$cost= (int)$_POST['cost']; 
$table = $_POST['table'];

echo $table;


$query = " insert into book (Item_Name,Item_Cost,Item_Count) values ('$name',$cost,$count)";

if($conn->query($query)){
  echo "Inserted";
}

$query1 = "update $table set Item_Orders = Item_Orders + $count where Item_Name='$name'";
if($conn->query($query1)){
  echo "Inserted Count";
};
?>
<?php
$servername = "sql103.ezyro.com";
$username = "ezyro_28837284";
$password = "ssd123";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
echo "Connected successfully";
?>
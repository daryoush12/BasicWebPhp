<?php




function ConnectionOpen(){
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "taskmng";
// Create connection
$conn = new mysqli($servername, $username,$password, $database);
// Check connection
if ($conn->connect_error) {
    throw new Exception('Failed to connect into database server.');
    return null;
}
else {
    echo "Connected successfully";
    return $conn;
}
}
?>
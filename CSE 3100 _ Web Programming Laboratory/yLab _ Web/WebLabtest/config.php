<?php
//database configuration
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "user_data";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
// Connection successful - no need to echo message on every page
?>
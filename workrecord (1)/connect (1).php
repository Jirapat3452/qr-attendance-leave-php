<?php
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "workrecord_db";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
    die("Connect failed". mysqli_connect_error());
}
mysqli_query($conn, "SET NAMES 'utf8' "); 
?>
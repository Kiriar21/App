<?php
 
$dbhost='localhost';
$dbuser='root';
$dbpasswd='';
$conn1 = mysqli_connect($dbhost,$dbuser,$dbpasswd,$_COOKIE['nameDB']);
if ($conn1 -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn1 -> connect_error;
    exit();
}

?>
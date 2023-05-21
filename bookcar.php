<?php

/*
* Created by Belal Khan
* website: www.simplifiedcoding.net
* Retrieve Data From MySQL Database in Android
*/

//database constants
define('DB_HOST', 'localhost');
define('DB_USER', 'id20202357_root');
define('DB_PASS', '4p-x1p2S2WVmT9r');
define('DB_NAME', 'id20202357_table');

//
//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', '');
//define('DB_NAME', 'fastbooking');
//connecting to database and getting the connection object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Checking if any error occured while connecting
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$userid=$_POST["userid"];
$date =$_POST["date"];
$time =$_POST["time"];














$stmt ="INSERT INTO `bookedcar` (`id`, `status`, `time`, `date`) VALUES ('$userid', 'booked', '$time', '$date')";

if ($conn->query($stmt) === TRUE ) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
}

$conn->close();
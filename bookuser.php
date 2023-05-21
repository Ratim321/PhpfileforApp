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
$hotelid =$_POST["hotelid"];
$roomid =$_POST["roomid"];
$fromdate =$_POST["fromdate"];
$todate =$_POST["todate"];
$foostatus =$_POST["foodstatus"];













$uuid =  uniqid();
//creating a query
$stmt ="INSERT INTO `bookeduser` (`userid`, `bookingnumber`, `hotelid`, `roomid`,`fromdate`,`todate`) VALUES ('$userid', '$uuid', '$hotelid', '$roomid','$fromdate','$todate')";
$sql = "INSERT INTO `bookedroom` (`roomid`, `from_date`, `to_date`) VALUES ('$roomid', '$fromdate', '$todate')";

$sql2 = "INSERT INTO `userdashboard` (`id`, `bookedstatus`, `foodservice`, `roomid`, `fromdate`,`todate`) VALUES ('$userid', 'yes', '$foostatus','$roomid','$fromdate','$todate')";

if ($conn->query($stmt) === TRUE && $conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
}

$conn->close();
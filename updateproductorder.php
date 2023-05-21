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

//connecting to database and getting the connection object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Checking if any error occured while connecting
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$ProductName=$_POST["ProductName"];
$quantity =$_POST["quantity"];
$TotalPrice =$_POST["TotalPrice"];
$date =$_POST["date"];
$status =$_POST["status"];
$delivary =$_POST["delivary"];
$category=$_POST["category"];
$CustomerName=$_POST["CustomerName"];
$CustomerId=$_POST["CustomerId"];
$image=$_POST["image"];



$sql = "SELECT * FROM user WHERE id  = '$CustomerId'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$phone_NO=$user['phoneNo'];










//creating a query
$stmt ="INSERT INTO `order` (`ProductName`, `TotalPrice`, `quantity`, `date`, `status`, `delivary`, `category`,`CustomerName`,`CustomerId`,`CustomerPhoneNo`,`image`) VALUES ('$ProductName','$quantity','$TotalPrice','$date','$status','$delivary','$category','$CustomerName','$CustomerId','$phone_NO','$image');";

if ($conn->query($stmt) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
}

$conn->close();
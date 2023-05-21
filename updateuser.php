<?php

/*
* Created by Belal Khan
* website: www.simplifiedcoding.net
* Retrieve Data From MySQL Database in Android
*/
//
//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', '');
//define('DB_NAME', 'fastbooking');



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
$id =$_POST["id"];
$username =$_POST["username"];


//creating a query
$stmt = $conn->prepare("UPDATE user SET username='$username' WHERE id = '$id'");

//executing the query
$stmt->execute();




//binding results to the query
$stmt->bind_result( $bookedstatus,$foodservice);






if ($stmt->affected_rows > 0) {
    echo "Query executed successfully.";
} else {
    echo "Query failed to execute.";
}
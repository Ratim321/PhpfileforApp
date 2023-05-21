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

//creating a query
$stmt = $conn->prepare("select  DISTINCT name,image from category");
//executing the query
$stmt->execute();

//binding results to the query
$stmt->bind_result( $category,$image);

$products = array();

//traversing through all the result
while($stmt->fetch()){
    $temp = array();

    $temp['category'] = $category;
    $temp['image'] = $image;
    array_push($products, $temp);
}










echo json_encode($products);
<?php
// Connect to the database
define('DB_HOST', 'localhost');
define('DB_USER', 'id20202357_root');
define('DB_PASS', '4p-x1p2S2WVmT9r');
define('DB_NAME', 'id20202357_table');

//connecting to database and getting the connection object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$id =$_POST["id"];

//creating a query
$stmt = $conn->prepare("SELECT username,email,adress,phoneNo	 FROM `user` WHERE id='$id'");

//executing the query
$stmt->execute();

//binding results to the query
$stmt->bind_result( $username,$email,$adress,$phoneNo);

$products = array();

//traversing through all the result
while($stmt->fetch()) {
    $temp = array();

    $temp['username'] = $username;
    $temp['email'] = $email;
    $temp['adress'] = "1123";
    $temp['phoneNo'] = $phoneNo;


    array_push($products, $temp);
}
echo json_encode($products)
?>
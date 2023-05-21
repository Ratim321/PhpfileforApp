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
$name =$_POST["name"];
$adult =$_POST["adult"];
$children =$_POST["children"];
$fromdate =$_POST["fromdate"];
$todate =$_POST["todate"];
//creating a query
$stmt = $conn->prepare("SELECT r.roomid,r.hotelid,r.roomtype,r.price,r.size,h.hotelname,h.address,h.location,h.phoneno,h.email,h.rating,b.from_date,b.to_date FROM room r,hotel h,bookedroom b WHERE h.id=r.hotelid and   b.roomid=r.roomid  AND b.from_date <= '$fromdate' AND b.to_date >= '$todate'  and h.hotelname like '%$name%'and r.adult>='$adult' and r.children>='$children'");

//executing the query
$stmt->execute();




//binding results to the query
$stmt->bind_result( $roomid,$hotelid,$roomtype,$price,$size,$hotelname,$address,$location,$phoneno,$email,$rating,$fromdate,$todate);

$hotels = array();

//traversing through all the result
while($stmt->fetch()){
    $temp = array();
    $temp['roomid'] = $roomid;
    $temp['hotelid'] = $hotelid;
    $temp['hotelname'] =$hotelname;
    $temp['address'] =$address;
    $temp['location'] = $location;
    $temp['phoneno'] = $phoneno;
    $temp['email'] = $email;
    $temp['roomtype'] = $roomtype;
    $temp['rating'] = $rating;
    $temp['price'] = $rating;
    $temp['size'] = $size;
    $temp['fromdate'] = $fromdate;
    $temp['todate'] = $todate;


    array_push($hotels, $temp);
}










echo json_encode($hotels);
<?php
// Connect to the database
define('DB_HOST', 'localhost');
define('DB_USER', 'id20202357_root');
define('DB_PASS', '4p-x1p2S2WVmT9r');
define('DB_NAME', 'id20202357_table');

//connecting to database and getting the connection object
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check for registration form submission

// Get the form data
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phoneNo = $_POST['phone'];

// Check if the passwords match

// Hash the password
//        $password = password_hash($password, PASSWORD_DEFAULT);

// Insert the new user into the database
if($username!=null&&$email!=null&&$password !=null&&$phoneNo!=null) {
       $sql = "INSERT INTO user(id,username,password,email,phoneNo) VALUES ('$id','$username','$password','$email','$phoneNo')";

    if ($db->query($sql) === TRUE) {


        $sql1 = "SELECT id FROM user WHERE username = '$username'";
        $result1 = mysqli_query($db, $sql1);
        $user1 = mysqli_fetch_assoc($result1);





        echo json_encode(array('status' => "success", 'id' => $user1['id']));
    } else {
               echo json_encode(array('status' => mysqli_error($db)+" "+"PHPDBERROR", 'type' => "Invalid"));

    }
}else{
    echo json_encode(array('status' => "empty field", 'type' => "Empty"));
}




?>
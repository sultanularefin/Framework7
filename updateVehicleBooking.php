<?php
header("Content-Type: application/json; charset=UTF-8");
require 'dbconfig.php';

$table = "";
$dropdownData = "";
$bookings_id = "";
$booking_date = "";
$returnDate = "";
$userid="";
//$booking_date = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $table = isset($_POST["table"]) ? $_POST["table"] : "";
    $booking_id = isset($_POST["bookings_id"]) ? $_POST["bookings_id"] : "";
//    $booking_date = isset($_POST["bookings_id"]) ? $_POST["bookings_id"] : "";

    $userid = isset($_POST["userid"]) ? $_POST["userid"] : "";




//    print_r($ddldata);

    $returnDate = isset($_POST["returnDate"]) ? $_POST["returnDate"] : "";
    $passangerNumber = isset($_POST["passangerNumber"]) ? $_POST["passangerNumber"] : "";
    $booking_date = isset($_POST["booking_date"]) ? $_POST["booking_date"] : "";

//
//    print("return Date:");
//    print_r($returnDate);
//
//    print("booking date:");
//
//    print_r($booking_date);
//
//    print("booking id:");
//    print_r($booking_id);


//    exit();

    $ddldata = json_decode($_POST["data"], true);
//
//    print($passangerNumber);
//    print($table);


//   print_r($ddldata);
//
//   exit();

    $destination = $ddldata[1]['selectedValue'];

//    print_r($ddldata[2]);

//    print_r($destination);


//    exit();

    $car = $ddldata[2]['selectedValue'];

    $pickUpLocation = $ddldata[0]['selectedValue'];

//    $bookingTime=getdate();


    $edited_time = date("Y-m-d");

//    print($d);


//    exit();


//    $dropdownData=isset($_POST["data"]) ? $_POST["data"] : "";

//    print($dropdownData);


//    $x=json_decode(dropdownData);
//    print($x);
//
//    exit();

//    json_encode


//    print($table);
//    exit();
//    $uname = isset($_POST["username"]) ? $_POST["username"] : "";
//    $password = isset($_POST["password"]) ? $_POST["password"] : "";


//    print($table);
//    exit();
//    print("email: ");
//    print("password: ");
//    print($email);
//    print($password);

    //echo "username and password: ",$uname,$pass;
}


$query = "update " . $table . " set destination = $destination, carNumber= $car, bookingTime=('$booking_date'), returnTime=('$returnDate'),
 pickupFrom= $pickUpLocation, passengers= $passangerNumber,userid= $userid,edited_time=('$edited_time') where bookings_id= $booking_id";


//print_r($query);
//exit();
//


//    $query = "select title,description,user_id  from posts where posts.id='$post_id';";
$conn = new mysqli($hn, $un, $pw, $db);

//    print($query);
//    exit();

if ($conn->connect_error) {

//    print("At line 49");


    echo json_encode(array("value" => 0, "message" => 'Connection error with database, please try again '));
//    die($connection->connect_error);


}


$result = $conn->query($query);


if (!$result) {

//        echo json_error('Email not found please enter valid email.');
    echo json_encode(array("value" => 0, "message" => 'problem in storing info. in db'));
//        die($connection->error);

} else {


    echo json_encode(array("value" => 1, "message" => "Success"));
//    print($myJSON);
}


$conn->close();

//    $result->close();
return $result;



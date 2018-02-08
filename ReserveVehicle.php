<?php
header("Content-Type: application/json; charset=UTF-8");
require 'dbconfig.php';

//    print("xxxxxxxxxxxxxxx");
//    exit();

$table = "";
$dropdownData = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $table = isset($_POST["table"]) ? $_POST["table"] : "";
    $userid = isset($_POST["userid"]) ? $_POST["userid"] : "";

    $ddldata = json_decode($_POST["data"], true);

//    print_r($ddldata);

    $returnDate = isset($_POST["date"]) ? $_POST["date"] : "";
    $passangerNumber = isset($_POST["passangerNumber"]) ? $_POST["passangerNumber"] : "";


//    print($returnDate);
//
//    print($passangerNumber);
//    print($table);


//    print_r($ddldata);

    $destination= $ddldata[2]['selectedValue'];

//    print_r($ddldata[2]);

//    print_r($destination);



//    exit();

    $car =$ddldata[3]['selectedValue'];

    $pickUpLocation=$ddldata[1]['selectedValue'];

//    $bookingTime=getdate();

    $bookingTime=date("Y-m-d");

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


$query = "INSERT INTO ".$table."(destination, carNumber, bookingTime, returnTime, pickupFrom, passengers,userid) 
VALUES ($destination,$car,('$bookingTime'),('$returnDate'),$pickUpLocation,$passangerNumber,$userid)";


//print($query);
//exit();




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


    echo json_encode(array("value" => 1, "message" =>"Success"));
//    print($myJSON);
}


$conn->close();

//    $result->close();
return $result;



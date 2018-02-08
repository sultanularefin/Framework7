<?php

require 'dbconfig.php';

//    print("xxxxxxxxxxxxxxx");
//    exit();

$table = "";
$userid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $userid = isset($_POST["user"]) ? $_POST["user"] : "";
    $table = isset($_POST["table"]) ? $_POST["table"] : "";


//    $uname = isset($_POST["username"]) ? $_POST["username"] : "";
//    $password = isset($_POST["password"]) ? $_POST["password"] : "";


//    print("table: ");
//    print($table);
//    exit();
//    print("userid: ");
//    print("password: ");
//    print($email);
//    print($userid);

    //echo "username and password: ",$uname,$pass;
}

$query = "select bookings.id,bookings.bookingTime,bookings.returnTime,bookings.passengers,car.name, location.value, pickuplocation.pickUpLoc 
from pickuplocation, bookings,car,location where car.id = bookings.carNumber and location.id=bookings.destination and
 pickuplocation.id= bookings.pickupFrom and bookings.userid= $userid;";


//$query = "select * from $table where userid=$userid;";


//    $query = "select title,description,user_id  from posts where posts.id='$post_id';";
$conn = new mysqli($hn, $un, $pw, $db);

//print_r($query);
//exit();

if ($conn->connect_error) {

//    print("At line 49");


    echo json_encode(array("value" => 0, "message" => 'Connection error with database, please try again '));
//    die($connection->connect_error);


}


$result = $conn->query($query);


if (!$result) {

//        echo json_error('Email not found please enter valid email.');
    echo json_encode(array("value" => 0, "message" => 'Empty result returned from functions'));
//        die($connection->error);
} elseif (0 == ($result->num_rows)) {

    echo json_encode(array("value" => 0, "message" => '0 results returned from functions.'));

} else {
    $num = $result->num_rows;


//    $row = $result->fetch_array(MYSQLI_NUM);


//            $row = $result->fetch_array(MYSQLI_ASSOC);


//        print($row[0]);
//        exit();
    $id = '';
    $value = '';
    $index = 1;
//    $oneLocation->id=0;
//    $oneLocation->value='';

    class vehicleBooking
    {
        public $id;

        public $destination;
        public $bookingtime;
        public $PickUpLocation;
        public $PassengerNumber;
        public $CarId;
        public $ReturnTime;

    }

    $arrayOfBookings = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {


        $id = ($row['id']);
        $bookingtime = ($row['bookingTime']);
        $ReturnTime = ($row['returnTime']);
        $PassengerNumber = ($row['passengers']);
        $CarId = ($row['name']);
        $destination = ($row['value']);
        $PickUpLocation = ($row['pickUpLoc']);


        $oneInstance = new vehicleBooking();


        $oneInstance->id=$id;
        $oneInstance->bookingtime=$bookingtime;
        $oneInstance->ReturnTime=$ReturnTime;
        $oneInstance->PassengerNumber=$PassengerNumber;
        $oneInstance->CarId=$CarId;
        $oneInstance->destination=$destination;
        $oneInstance->PickUpLocation=$PickUpLocation;

//        print_r($oneInstance);

        $arrayOfBookings[] = $oneInstance;



        $index = $index + 1;

//        exit();

//        print($location);
//        array_push($location, $x);
//        print($location);

//            $location[$index]->id=$id;
//            $location[$index]->value = $value;
//
//            $index++;
    }




    $myJSON = json_encode($arrayOfBookings);
    //var_dump($arrayOfLocations);


//    print_r($myJSON);
//    exit();

    //$myJSON = json_encode($location);


//    echo json_encode($named_array);

    echo json_encode(array("value" => 1, "message" => $myJSON));
//    print($myJSON);
}


$conn->close();

//    $result->close();
return $result;



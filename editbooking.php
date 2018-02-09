<?php

require 'dbconfig.php';

//    print("xxxxxxxxxxxxxxx");
//    exit();

//$table = "";
$bookings_id= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $bookinid = isset($_POST["bookings_id"]) ? $_POST["bookings_id"] : "";
//    $table = isset($_POST["table"]) ? $_POST["table"] : "";
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

$query = "SELECT * FROM bookings INNER JOIN car on car.car_id= bookings.carNumber INNER join pickuplocation 
on pickuplocation.loc_id= bookings.pickupFrom INNER join location
 on location.location_id = bookings.destination where bookings.bookings_id= $bookinid;";



//print_r($query);
//exit();
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


    $index = 1;
//    $oneLocation->id=0;
//    $oneLocation->value='';

    class vehicleBooking
    {
        public $bookings_id;
        public $destinationId;
        public $destinationName;
        public $CarId;
        public $CarName;
        public $bookingTime;
        public $ReturnTime;
        public $PickUpLocationId;
        public $PickUpLocationName;
        public $PassengerNumber;
        public $userId;

//        public $destinationValue;
//        public $PickUpLocation;

    }

//    $arrayOfBookings = array();
    //only one result will be returned in this editbookings
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {


        $bookings_id =($row['bookings_id']);
        $destinationId =($row['destination']);
        $destinationName = ($row['value']);
        $CarId =($row['car_id']);
        $CarName = ($row['name']);
        $bookingTime = ($row['bookingTime']);
        $ReturnTime = ($row['returnTime']);
        $PickUpLocationId =  ($row['loc_id']);
        $PickUpLocationName= ($row['pickUpLoc']);
        $PassengerNumber = ($row['passengers']);
        $userId = ($row['userid']);

        $oneInstance = new vehicleBooking();


        $oneInstance->bookings_id = $bookings_id;
        $oneInstance->destinationId=$destinationId;
        $oneInstance->destinationName=$destinationName;
        $oneInstance->CarId= $CarId;
        $oneInstance->CarName=$CarName;
        $oneInstance->bookingTime = $bookingTime;
        $oneInstance->ReturnTime = $ReturnTime;
        $oneInstance->PickUpLocationName = $PickUpLocationName;
        $oneInstance->PickUpLocationId=$PickUpLocationId;
        $oneInstance->PassengerNumber = $PassengerNumber;
        $oneInstance->userId=$userId;



//        print_r($oneInstance);

//        exit();


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



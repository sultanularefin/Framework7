<?php

require 'dbconfig.php';

//    print("xxxxxxxxxxxxxxx");
//    exit();

$table = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $table = isset($_POST["table"]) ? $_POST["table"] : "";
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

$query = "select * from $table;";


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
    echo json_encode(array("value" => 0, "message" =>'Empty result returned from functions'));
//        die($connection->error);
} elseif (0 == ($result->num_rows)) {

    echo json_encode(array("value" => 0, "message" =>'0 results returned from functions.'));

} else {
    $num = $result->num_rows;


//    $row = $result->fetch_array(MYSQLI_NUM);


//            $row = $result->fetch_array(MYSQLI_ASSOC);


//        print($row[0]);
//        exit();
    $id = '';
    $name = '';
    $index = 1;
//    $oneLocation->id=0;
//    $oneLocation->value='';

    class car
    {
        public $id;
        public $name;
    }

    $arrayOfCars = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {


        $id = ($row['id']);

        $name = ($row['name']);


        $arrayItem = new car();

        $arrayItem->name = $name;
        $arrayItem->id = $id;
        $arrayOfCars[] = $arrayItem;

        $index = $index + 1;

//        print($location);
//        array_push($location, $x);
//        print($location);

//            $location[$index]->id=$id;
//            $location[$index]->value = $value;
//
//            $index++;
    }



    $myJSON = json_encode($arrayOfCars);

//    print($myJSON);
//    exit();
//    var_dump($arrayOfLocations);


    //exit();

    //$myJSON = json_encode($location);


//    echo json_encode($named_array);

    echo json_encode(array("value" => 1, "message" =>$myJSON));
//    print($myJSON);
}


$conn->close();

//    $result->close();
return $result;



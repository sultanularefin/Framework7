<?php

require 'dbconfig.php';

//    print("xxxxxxxxxxxxxxx");
//    exit();

$table = "";
$id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = isset($_POST["id"]) ? $_POST["id"] : "";
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

$query = "delete from $table where bookings_id=$id;";


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

} else {

    echo json_encode(array("value" => 1, "message" =>"success"));
//    print($myJSON);
}


$conn->close();

//    $result->close();
return $result;



<?php


// put your code here
$email = $uname = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// $original = ($_POST["number"]);

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $uname = isset($_POST["username"]) ? $_POST["username"] : "";
    $pass = isset($_POST["password"]) ? $_POST["password"] : "";
    $registration = $_POST['registration'];

    $name = $_POST['name'];
    $email = $_POST['email'];


    print($name);
    print($email);
    require_once 'dbconfig.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error)
        die($conn->connect_error);

    if (($email == "") && ($username == "") && ($password == "")) {
        echo "Enter all values for Registration";

        exit();
    }


    $pass = hash('ripemd128', $pass);

    $query = "INSERT INTO users (email,username,password,full_name) VALUES" .
        "('$email', '$uname', '$pass', '$fname')";


    $result = $conn->query($query);


    // echo "result: ", $result," ","database: ", $db, "<br/>";
    // print_r($db);

    if (!$result)
        echo "INSERT failed: $query<br>" .
            $conn->error . "<br><br>";
    else {


        print("login successful, please login in the login page");
        header("refresh:1;url=login.php");
        header('Location: ./login.php');


    }

    $conn->close();

    if ($registration == "success") {
        // some action goes here under php
        echo json_encode(array("abc" => 'successfuly registered'));
    }
}


?>










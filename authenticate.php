<?php

require_once './dbconfig.php';
//require_once './functions.php';


//echo "autheticate page";

$email = $username = $password = $login_result = "";


class user
{
    public $user_email;
    public $password;
    public $last_login;
    public $username;
    public $is_logged_in;
    public $session_user_id;

}

//$session_check = isset($_POST["session_check"])?$_POST["session_check"]:"";

if (isset($_POST["session_check"])) {

    if (!isset($_SESSION['user'])) {

        echo json_encode(array("value" => 3, "message" => 'Please login, with email and password'));
        return;

    } else {

        $oneInstance = $_SESSION['user'];

//    print_r($_SESSION);
//    print_r($oneInstance);

//    exit();

        echo json_encode(array("value" => 2, "session_data" => $oneInstance));
        return;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = isset($_POST["email"]) ? $_POST["email"] : "";
//    $uname = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";


//    print("email: ");
//    print("password: ");
//    exit();
//    print($email);
//    print($password);

    //echo "username and password: ",$uname,$pass;
}

//exit();


if (($email == "") && ($password == "")) {

//    print("At line 28");

    // some action goes here under php
//    echo json_last_error('Please Fill every detail for login, i.e. email and password.');
    echo json_encode(array("value" => 0, "message" => 'Please Fill every detail for login, i.e. email and password'));

}

//exit();

//print("At line 50");

//exit();

$connection = new mysqli($hn, $un, $pw, $db);

//print($hn);
//print($un);
//print($pw);
//print($db);
//exit();


if ($connection->connect_error) {

//    print("At line 49");


    echo json_encode(array("value" => 0, "message" => 'Connection error with database, please try again '));
//    die($connection->connect_error);


}

//print("At line 57");

//exit();


if (isset($email) && isset($password)) {


//    print($email);
//    exit();
    $email_temp = mysql_entities_fix_string($connection, $email);
    $password_temp = mysql_entities_fix_string($connection, $password);

//    print($email_temp);
//    exit();


    $query = "SELECT * FROM users WHERE email='$email_temp'";

//    print($query);
//    exit();

//    print("result: ");
//    $result = $conn->query($query);
    $result = $connection->query($query);


//    print(isset($result));

//    exit();


    if (!$result) {

//        print("dsfd");

        echo json_encode(array("value" => 0, "message" => 'Query with email doesn\'t give any result (will be changed) .'));
//        die($connection->error);
    } elseif (0 == ($result->num_rows)) {

//        print("trter");

        echo json_encode(array("value" => 0, "message" => 'No results found for this Email, please enter valid email.'));

    } else {


        $row = $result->fetch_array(MYSQLI_NUM);


//            $row = $result->fetch_array(MYSQLI_ASSOC);


//        $result->close();


//        print($row[0]);
//        exit();


//        $arrayOfBookings = array();

        $oneInstance = new user();


        if ($password == $row[2]) {
            //session_start();


            $oneInstance->user_email = $email_temp;
            $oneInstance->password = $password_temp;
            $oneInstance->username = $row[3];
            $oneInstance->last_login = date("Y-m-d");
            $oneInstance->is_logged_in = true;
            $oneInstance->session_user_id=$row[0];
            $login_result = "success";
            $userid = $row[0];


            $_SESSION['user'] = $oneInstance;


//            print_r($oneInstance);

//            print_r($_SESSION['user']);


        } else {
            echo json_encode(array("value" => 0, "message" => 'Password not correct.'));
        }

//        print('default');

//        $connection->close();


    }
    $connection->close();

}
//
//$connection->close();

if ($login_result == "success") {
    // some action goes here under php
    echo json_encode(array("value" => $userid, "message" => 'Successfully Registered'));
}


function mysql_entities_fix_string($connection, $string)
{
    return htmlentities(mysql_fix_string($connection, $string));
}

function mysql_fix_string($connection, $string)
{
    if (get_magic_quotes_gpc())
        $string = stripslashes($string);
    return $connection->real_escape_string($string);
}

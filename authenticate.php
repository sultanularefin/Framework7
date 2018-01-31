<?php

require_once './dbconfig.php';
require_once './functions.php';


//echo "autheticate page";

$email = $username = $password = $login_result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = isset($_POST["email"]) ? $_POST["email"] : "";
//    $uname = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

//    print($email);
//    print($password);

    //echo "username and password: ",$uname,$pass;
}


if (($email == "") && ($password == "")) {

    print("At line 28");

    // some action goes here under php
    echo json_encode(array("abc" => 'Please Fill every detail for login, i.e. email and password'));

}

//print("At line 50");

//exit();

$connection = new mysqli($hn, $un, $pw, $db);

//print($hn);
//print($un);
//print($pw);
//print($db);
//exit();


if ($connection->connect_error) {

    print("At line 49");

    echo json_encode(array("abc" => 'Connection error with database, please try again '));
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

    print("result:      ");
//    $result = $conn->query($query);
    $result = $connection->query($query);


    if (!$result) {

        echo json_encode(array("abc" => 'Email not found please enter valid email.'));
//        die($connection->error);
    } elseif ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);

//            $row = $result->fetch_array(MYSQLI_ASSOC);


        $result->close();

//        print($row[0]);
//        exit();


        if ($password == $row[2]) {


            //session_start();
            $_SESSION['username'] = $email_temp;
            $_SESSION['password'] = $password_temp;
            $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $row[3];
            $_SESSION['is_loggedin'] = TRUE;
            $login_result = "success";


//            print("EVERYTHING IS GOOD");
//            return;

//            header('Location: ./index.php');
            //echo "<p><a href='user_post.php'>Click here to continue</a></p>";
        }


    }
}

$connection->close();

if ($login_result == "success") {
    // some action goes here under php
    echo json_encode(array("abc" => 'Successfully Registered'));
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

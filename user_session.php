<?php

require_once './authenticate.php';
//require_once './functions.php';


//echo "autheticate page";




class user
{
    public $user_email;
    public $password;
    public $last_login;
    public $username;
    public $is_logged_in;

}

if (!isset($_SESSION['user'])) {

    echo json_encode(array("value" => 0, "message" => 'Please login, with email and password'));

}

else{

    $oneInstance=$_SESSION['user'];

//    print_r($_SESSION);
//    print_r($oneInstance);

//    exit();

    echo json_encode(array("value" => 2, "session_data" => $oneInstance));
}

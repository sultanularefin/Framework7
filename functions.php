<?php

include_once './dbconfig.php';  // session defined here.


/*
  $query = "Select  po.id as post_id, us.id as us_id, po.user_id,po.title, po.description, po.added_date, po.modified_date,po.is_active
  ,us.email,us.username,us.password,us.full_name,us.registration_date,us.modified_date,us.is_active
  from users as us, posts as po where us.Id = po.user_id Order by us.id desc LIMIT 5;";
 */

function get_top_articles() {

    require 'dbconfig.php';

    $query = "Select  po.id as post_id, us.id as us_id, po.user_id,po.title, po.description, po.added_date, po.modified_date,po.is_active
           ,us.email,us.username,us.password,us.full_name,us.registration_date,us.modified_date,us.is_active
        from users as us, posts as po where us.Id = po.user_id Order by us.id desc LIMIT 5;";

    $conn = new mysqli($hn, $un, $pw, $db);


    if ($conn->connect_error)
        die($conn->connect_error);

//
//    echo '<pre>';
//    print_r($conn->connect_error);

    $result = $conn->query($query);
//
//    print_r($result);
//
//    //echo "result::::", $result;
//
//    exit();

    return $result;
}

function get_user_posts($user_id) {

    //echo $user_id;
    require 'dbconfig.php';



    $query = "Select  po.id as post_id, us.id as us_id, po.user_id,po.title, po.description, po.added_date, po.modified_date
,us.full_name from users as us, posts as po where us.Id = '$user_id' and po.user_id= '$user_id' Order by us.id desc ;";

    $conn = new mysqli($hn, $un, $pw, $db);


    if ($conn->connect_error)
        die($conn->connect_error);

//
//    echo '<pre>';
//    print_r($conn->connect_error);

    $result = $conn->query($query);
    // pr($result);
    // exit();
//
//    print_r($result);
//
//    //echo "result::::", $result;
//
//    exit();

    return $result;
}

function get_posts_by_posts_id($post_id) {
    require 'dbconfig.php';

    $query = "select title,description,user_id  from posts where posts.id='$post_id';";
    $conn = new mysqli($hn, $un, $pw, $db);


    if ($conn->connect_error)
        die($conn->connect_error);
    
     $result = $conn->query($query);
     
     return $result;
}

function get_post_id_by_title($title){
    echo "get_post_id_by_title($title)";
    require 'dbconfig.php';

    //$query = "select post_id from posts , users where posts.title='$title';";
    
    $query = "select posts.id from posts where posts.title='$title';";
    
    $conn = new mysqli($hn, $un, $pw, $db);


    if ($conn->connect_error)
        die($conn->connect_error);
    
     $result = $conn->query($query);
     //$row = $result->fetch_array(MYSQLI_ASSOC);
     
     //$row = $resultnew_post_id->fetch_array(MYSQLI_ASSOC);
     
     //print_r($row);
    // exit();
     return $result;
     
     
    
}

function get_details_of_post_by_id($post_id){
    
    require 'dbconfig.php';

    $query = "select user_id, users.full_name, title, description, users.id,posts.added_date from posts ,
users where posts.id='$post_id' and users.id=posts.user_id;";
    
    $conn = new mysqli($hn, $un, $pw, $db);


    if ($conn->connect_error)
        die($conn->connect_error);
    
     $result = $conn->query($query);
     
    // print_r($result);
    // exit();
     return $result;
    
}




function pr($array = array()) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

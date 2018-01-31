<?php
include_once './dbconfig.php';
if ((isset($_SESSION['id'])==0)&&(isset($_SESSION['username']))==0)
             header("Location: ./unauthorised.php" );
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logout page </title>
        <style>

            h1{ color:#2D2901;
                font-size:200%;
                letter-spacing:2px;

            } 

            h6 {
                color: blue
            }

            ul li {
                display:inline;
                /*word-spacing:50px;*/
                margin-right:4em;
                top:200px;
                padding:1px 1px 1px 1px;
                text-decoration:none;   
            }

            span{
                color:crimson;
                font-size:medium;
            }

            ul li a {
                text-decoration:none;
                list-style:none;
                letter-spacing:1px;
                color:red;
                /*display:block;*/
            }



        </style>

    </head>
    <body>


        <?php
        include './menu.inc.php';
        ?>



        <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $user_id = $_SESSION['id'];
            $full_name = $_SESSION['full_name'];

            destroy_session_and_data();

            echo "Hello $username.<br>
          Your full name is $full_name.<br>
         and you are successfully logged out from our system. <br/> <br/>";

            echo "Please <a href='login.php'>click here</a> to log in.";
        } else
            echo "Please <a href='login.php'>click here</a> to log in.";

        function destroy_session_and_data() {

            echo " destroy_session_and_data is visited ";
            $_SESSION = array();

            session_destroy();
            header('Location: ./index.php');
            
        }
        ?>

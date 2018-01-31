<?php
//error_reporting(0);
//session_start();
//since registration page so destroy the old session.
if (isset($_SESSION)) {
    $_SESSION = array();
 session_destroy();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form </title>
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
        
        $reg_success="";
        ?>

        <h1>Registration Form</h1>
        <p>Please fill in all fields and click Register.</p>

        <!-- post form data to form.php -->
        <form method = "post" action = "">
            <h2>User Information</h2>


            <div><label>Email:</label>
                <input type = "email" name = "ename" placeholder = "name@domain.com" required></div>

            <div><label>User Name:</label> 
                <input type = "text" name = "uname" required> </div>

            <div><label>Password:</label>
                <input type = "password" name = "pass" required > </div>
            <div><label>Full Name:</label>
                <input type = "text" name = "fname" 
                       required></div>

            <p><input type = "submit" name = "submit" value = "Register"> </p>
        </form>



        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {



            // put your code here
            $email = $uname = $pass = $fname = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {


                $email = isset($_POST["ename"]) ? $_POST["ename"] : "";
                $uname = isset($_POST["uname"]) ? $_POST["uname"] : "";
                $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
                $fname = isset($_POST["fname"]) ? $_POST["fname"] : "";
            }
            require_once 'dbconfig.php';



            // echo $email;

            $conn = new mysqli($hn, $un, $pw, $db);

            //exit();
            if ($conn->connect_error)
                die($conn->connect_error);

            //die("<p>Could not connect to database</p>");
            // echo $email , $uname,  $pass, $fname;
            // print_r($email);

            if (($email == "") && ($uname == "") && ( $pass == "") && ($fname == "")) {
                echo "Enter all values for Registration";

                exit();
            }



            // echo $email;

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

                // session started in dbconfig
            
                
//print_r(isset($_SESSION));

//echo "a";

//exit();
//                print("<p>    Successful   </p>");
               // if (!isset($_SESSION)) {
                //    session_start();

//                    $_SESSION['username'] = $uname;
//                    $_SESSION['password'] = $pass;
//
//                    $_SESSION['full_name'] = $fname;

//            print_r($_SESSION);
//            exit();

                    print("login successful, please login in the login page");
                    header("refresh:1;url=login.php");
                    header('Location: ./login.php');
                    
                    
                
            }

            $conn->close();
        }
        ?>
    </body>
</html>


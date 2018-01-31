<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form </title>
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
   
        <h1>Login Form</h1>
        <p>Please fill in all fields and click login.</p>

        <!-- post form data to form.php -->
        <form method = "post" action = "authenticate.php">
            <h2>Enter Login Information</h2>


            <!--            <div><label>Email:</label>
                            <input type = "email" name = "ename" placeholder = "name@domain.com" required></div>-->

            <div><label>User Name:</label> 
                <input type = "text" name = "uname" required ></div>

            <div><label>Password:</label>
                <input type = "password" name = "pass" required   ></div>


            <p><input type = "submit" name = "submit" value = "Login"></p>
        </form>
    </body>



    <?php
    // $_GET['blog_id'];
// 

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (isset($_GET['error'])) {

            $error = $_GET['error'];
            $sign1 = '<span style="color: red;">Invalid username/password combination</span>';
            $sign2 = '<span style="color: red;">Please enter your username and password</span>';

            if ($error == 1)
                print($sign1);
            header("refresh:1;url=login.php");

            if ($error == 2)
                print($sign2);
            header("refresh:1;url=login.php");
        }
    }


    // put your code here
    ?>

</html>


<?php
include_once './dbconfig.php';
require_once './functions.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>details page </title>
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
		$error="Something is wrong";
    if (isset($_GET['id'])&& isset($_GET['branch'])) {
        echo $_GET['id'];
        echo '<br/><br/><br/>';
        echo $_GET['branch'];
    }
else{
        
	echo '<script type="text/javascript">alert("'.$error.'");</script>';
        // // // // // fallback behaviour goes here
    }
?>
    </body>
</html>


<!--http://localhost:8088/customledger/asset.php?id=2&branch=4.-->



<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */-->


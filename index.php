<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <?php

        session_start();
        include("./client/nav.php");

        if(!isset($_SESSION["user"])){

            if(isset($_GET['login'])){
                include("./client/login.php"); 
            }
            else{
                include("./client/signup.php"); 
            }
    
        }
        

        if(isset($_SESSION["user"])){
            include('./client/todo.php');
        }

        // if(isset($_GET['todo'])){
        //     include("./client/todo.php"); 
        // }


    ?>


</body>
</html>

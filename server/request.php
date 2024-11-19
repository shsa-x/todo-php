<?php

session_start();

include("../db/db.php");

    if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $id = '';
        for ($i = 0; $i < 8; $i++) {
        $id .= rand(0, 9); // Append a random digit (0-9)
        }

        $isUserResult = $conn->query("select * from user where email='$email'");
        if($isUserResult->num_rows > 0){
            echo '
                <h1 class="text-xl text-center text-red-500" >User already exist </h1>
            ';
            return;
        }

        $user = $conn->prepare("Insert into `user`(`id`,`email`,`name`,`password`)values('$id', '$email','$name','$password');");
        
        $result = $user->execute();
        if ($result) {
            $_SESSION["user"] = ["email" => $email, "name" => $name, "id" => $id];
             header("location: /todo_app/index.php");
        } else {
            echo '
                <h1 class="text-xl text-center text-red-500">User Not registered</h1>
            ';
        }
    } 

    else if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from user where email='$email'";
        $result = $conn->query($query);
    
        if ($result->num_rows <= 0) {
            echo '
                <h1 class="text-xl text-center text-red-500" >User does not exist </h1>
            ';
        } 
        else {
            $user = $result->fetch_assoc(); 
            if($user['password'] != $password){  
                echo '
                <h1 class="text-xl text-center text-red-500">Invalid Password! Login again.</h1>
                ';
            }
            else {
                $_SESSION["user"] = ["email" => $user['email'], "name" => $user['name'], "id" => $user['id']];
                header("location: /todo_app/index.php");
            }
        }  
        exit();
    }

    else if(isset($_GET['logout'])) {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: /todo_app/index.php");
        exit();
    }

    else if(isset($_POST['addTodo'])) {

        $title = $_POST['title'];
        $id = $_SESSION['user']['id'];
        $isCompleted = 1;

        $query = "Insert into `todo` (`userId`,`title`)values('$id', '$title');";
        $result = $conn->query($query);

        header("location: /todo_app/index.php");

    }
    else if (isset($_POST['complete'])) {
        $todoId = $_POST['complete'];
        $query = "delete from todo where todoId='$todoId'";
        $result = $conn->query($query);

        header("location: /todo_app/index.php");
    }


?>

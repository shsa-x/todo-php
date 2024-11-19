<?php

    include("db.php");
 
    $userTableSql = "CREATE TABLE IF NOT EXISTS user (
        id INT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        name VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    $todoTableSql = "CREATE TABLE IF NOT EXISTS todo (
        userId INT,
        todoId INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        FOREIGN KEY (userId) REFERENCES user(id)
    )";

    if ($conn->query($userTableSql) === TRUE) {
        echo "Table 'user' created successfully.<br>";
    } else {
        echo "Error creating table 'user': " . $conn->error . "<br>";
    }

    if ($conn->query($todoTableSql) === TRUE) {
        echo "Table 'todo' created successfully.<br>";
    } else {
        echo "Error creating table 'todo': " . $conn->error . "<br>";
    }

    $conn->close();
?>

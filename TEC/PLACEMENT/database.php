<?php
function Connect_to_Database()
{ //function parameters, two variables.
    $servername = "localhost";
    $username = "test";
    $password = "test";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $Database_Name = "TEC";
    $sql = "CREATE DATABASE IF NOT EXISTS {$Database_Name}";
    if ($conn->query($sql) === TRUE) 
    {
    //Switch database
        $conn -> select_db($Database_Name);
        // echo "<br>Success creating database: " . $conn->error;
    } 
    else 
    {
        echo "<br>Error creating database: " . $conn->error;
    }

    return $conn;
}
<?php
function Connect_to_Database()
{
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

function SELECT_All_from_Query($conn, $Table_Name)
{
    $sql = "SELECT * FROM {$Table_Name}"; 

    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
        {

        //Returns an array representing the fetched row, where each key in the array represents the name of one of the result set's columns
        $row = $result->fetch_assoc();
        
        echo "<br> Opening Number {$row['Opening_Number']} was logged";
        echo "<br> Candidate_Number {$row['Candidate_Number']} was logged";
        echo "<br> Total_Hours_Worked {$row['Total_Hours_Worked']} was logged";

        } 
        else 
        {
        echo "<br> 0 results";
        }
}
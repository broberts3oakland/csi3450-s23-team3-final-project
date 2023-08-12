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


// function Print_Input($Boolean_of_Inserting_Values, $Values_as_Single_String)
// {
//     if ($Boolean_of_Inserting_Values == true) 
//     {
//         echo "<br> Successfully logged {$Values_as_Single_String}";
//     } else {
//         echo "<br> Didn't log values";
//     }

// }

function Create_Table($conn, $Table_Name, $Table_Signature)
{

    
    // Convert dictionary to array so it's easier to create the table
    $Columns =  implode(" ",$Table_Signature);

    $sql = "CREATE TABLE IF NOT EXISTS {$Table_Name}(
        {$Columns}
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

    if ($conn->query($sql) === TRUE) 
    {
    echo "Table created successfully";
    } else 
    {
    echo "<br> Error creating table: " . $conn->error;
    }


}

// function Insert_Values_Into_Table($conn, $Table_Name, $Table_Signature, $Values_as_Single_String)
// {
//     //Get list of keys because they're the columns
//     $Columns_Names = array_keys($Table_Signature);

//     //Make sure there's a space and comma after each column. Last column won't be affected
//     $Columns_Names_as_Single_String = implode(", ",$Columns_Names);
    
//     $sql = "INSERT INTO {$Table_Name}({$Columns_Names_as_Single_String}) VALUES 
//     ($Values_as_Single_String)";
//     if ($conn->query($sql) === TRUE) 
//     {
//         // echo $conn->query($sql);
//         echo "<br> New record created successfully";
//         return true;
//     } else {
//         echo "<br> Error: " . $sql . "<br>" . $conn->error;
//         return false;
//     }

// }
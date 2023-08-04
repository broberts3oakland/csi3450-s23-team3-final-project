<!DOCTYPE html>
<!-- test_get.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>A PHP Script for Testing the GET Protocol</title>
  </head>
  <body>
    <?php

$servername = "localhost";
$username = "test";
$password = "test";
$Database_Name = "TEC";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $Database_Name);
// Check connection
if (!$conn) 
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Table_Name = "PLACEMENT";
$sql = "SELECT * FROM {$Table_Name}"; 

$result = $conn->query($sql);
if ($result->num_rows > 0) 
  {

    echo "<table class='table'>";
    echo "<thead>";
    echo   "<tr>";
    echo     "<th scope='col'>#</th>";
    echo     "<th scope='col'>First</th>";
    echo     "<th scope='col'>Last</th>";
    echo     "<th scope='col'>Handle</th>";
    echo  "</tr>";
    echo "</thead>";

    echo "<tbody>";

    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
  
    echo   "<tr>";
    echo     "<th scope='row'>{$row['Opening_Number']}</th>";
    echo     "<td>{$row['Candidate_Number']}</td>";
    echo     "<td>{$row['Total_Hours_Worked']}</td>";
    echo   "</tr>";

    }
  } 
  else 
  {
    echo "<br> 0 results";
  }
  echo "</tbody>";
  echo "</table>";

    // ?>
  </body>
</html>

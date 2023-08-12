<!DOCTYPE html>
<!-- test_get.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php
require_once('../database.php');
$conn = Connect_to_Database();

$Table_Name = "DEGREE";
$sql = "SELECT * FROM {$Table_Name}"; 

$result = $conn->query($sql);
if ($result->num_rows > 0) 
  {

    echo "<table class='table table-bordered table-striped table-dark'>";
    echo "<thead>";
    echo   "<tr>";
    echo     "<th scope='col'>QUALIFICATION_CODE</th>";
    echo     "<th scope='col'>DESCRIPTION</th>";
    echo  "</tr>";
    echo "</thead>";

    echo "<tbody>";
    
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    echo   "<tr>";
    echo     "<th scope='row'>{$row['QUALIFICATION_CODE']}</th>";
    echo     "<td>{$row['DESCRIPTION']}</td>";
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

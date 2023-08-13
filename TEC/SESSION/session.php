<!DOCTYPE html>
<!-- test_get.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php
require_once('../database.php');


echo "<form class='row g-2' action='session_table.php' method='GET'>";
echo "<div class='col-auto'>";
echo "<button type='submit' class='btn btn-primary mb-3'>Display Table</button>";
echo "</div>";
echo "</form>";

$conn = Connect_to_Database();

$Table_Name = "SESSION";

$Columns_Names = [
  "SESSION_ID",
  "COURSE_ID",
  "TOTAL_ENROLLED",
  "TOTAL_FEES",
  "MAX_CAPACITY",
  "STARTING_TIME",
  "ENDING_TIME"
];

  $Columns_Names_as_Single_String = implode(", ",$Columns_Names);
  
  $val1 = $_GET['SESSION_ID'];
  $val2 = $_GET['COURSE_ID'];
  $val3 = $_GET['TOTAL_ENROLLED'];
  $val4 = $_GET['TOTAL_FEES'];
  $val5 = $_GET['MAX_CAPACITY'];
  $val6 = $_GET['STARTING_TIME'];
  $val7 = $_GET['ENDING_TIME'];



  $sql = "INSERT INTO {$Table_Name}({$Columns_Names_as_Single_String}) VALUES ($val1, $val2, $val3, $val4, $val5, '$val6', '$val7')";
  if ($conn->query($sql) === TRUE) 
  {
      // echo $conn->query($sql);
      echo "<br> New record created successfully";
      return true;
  } else 
  {
      echo "<br> Error: " . $sql . "<br>" . $conn->error;
      return false;
  };






    // ?>
  </body>
</html>

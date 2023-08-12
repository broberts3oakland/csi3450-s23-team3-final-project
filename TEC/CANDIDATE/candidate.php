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
require_once('../redo_tables.php');


echo "<form class='row g-2' action='candidate_table.php' method='GET'>";
echo "<div class='col-auto'>";
echo "<button type='submit' class='btn btn-primary mb-3'>Display Table</button>";
echo "</div>";
echo "</form>";

$conn = Connect_to_Database();
Create_All_Tables();

$Table_Name = "CANDIDATE";

$Columns_Names = [
  "CANDIDATE_ID",
  "FIRST_NAME",
  "LAST_NAME",
  "AGE",
  "SOCIAL_SECURITY",
  "DATE_OF_REGRISTRATION",
];

  $Columns_Names_as_Single_String = implode(", ",$Columns_Names);
  
  $val1 = $_GET['Candidate_ID'];
  $val2 = $_GET['First_Name'];
  $val3 = $_GET['Last_Name'];
  $val4 = $_GET['Age'];
  $val5 = $_GET['Social_Security'];
  $val6 = $_GET['Date_of_Regristration'];

  $sql = "INSERT INTO {$Table_Name}({$Columns_Names_as_Single_String}) VALUES ($val1, '$val2', '$val3', $val4, '$val5', '$val6')";
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

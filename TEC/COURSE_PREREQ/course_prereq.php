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


echo "<form class='row g-2' action='course_prereq_table.php' method='GET'>";
echo "<div class='col-auto'>";
echo "<button type='submit' class='btn btn-primary mb-3'>Display Table</button>";
echo "</div>";
echo "</form>";

$conn = Connect_to_Database();

$Table_Name = "COURSE_PREREQ";

$Columns_Names = [
  "QUALIFICATION_CODE",
  "COURSE_ID",
];

  $Columns_Names_as_Single_String = implode(", ",$Columns_Names);
  
  $val1 = $_GET['QUALIFICATION_CODE'];
  $val2 = $_GET['COURSE_ID'];




  $sql = "INSERT INTO {$Table_Name}({$Columns_Names_as_Single_String}) VALUES ('$val1', '$val2')";
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

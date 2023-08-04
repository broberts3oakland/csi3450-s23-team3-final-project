<!DOCTYPE html>
<!-- test_get.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Log Info</title>
  </head>
  <body>
    <?php
require_once('database.php');
$conn = Connect_to_Database();

$Table_Name = "PLACEMENT";
$sql = "CREATE TABLE IF NOT EXISTS {$Table_Name}(
        Opening_Number INT,
        Candidate_Number INT,
        Total_Hours_Worked FLOAT
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

if ($conn->query($sql) === TRUE) 
{
  echo "Table created successfully";
} else 
{
  echo "<br> Error creating table: " . $conn->error;
}

$sql = "INSERT INTO {$Table_Name}(Opening_Number, Candidate_Number, Total_Hours_Worked) VALUES 
('$_GET[Opening_Number]', '$_GET[Candidate_Number]', '$_GET[Total_Hours_Worked]')";
if ($conn->query($sql) === TRUE) 
{
  echo "<br> New record created successfully";
} else {
  echo "<br> Error: " . $sql . "<br>" . $conn->error;
}

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


  echo "<form class='row g-2' action='placement_table.php' method='GET'>";
  echo "<div class='col-auto'>";
  echo "<button type='submit' class='btn btn-primary mb-3'>Display Table</button>";
  echo "</div>";
  echo "</form>";

    // ?>
  </body>
</html>

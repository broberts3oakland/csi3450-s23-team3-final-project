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


//Make sure the last elemnt doesn't a comma
$Table_Signature = [
  "Opening_Number" => " Opening_Number INT,",
  "Candidate_Number" => "Candidate_Number INT,",
  "Total_Hours_Worked" => "Total_Hours_Worked FLOAT"
];

Create_Table($conn, $Table_Name, $Table_Signature);

$Values_from_UI = [$_GET['Opening_Number'], $_GET['Candidate_Number'], $_GET['Total_Hours_Worked']];

// Make sure there's a space and comma after each value. Last value won't be affected
$Values_as_Single_String =  implode(", ",$Values_from_UI);

Insert_Values_Into_Table($conn, $Table_Name, $Table_Signature, $Values_as_Single_String);

Print_Input($Values_as_Single_String);
// SELECT_All_from_Query($conn, $Table_Name);

echo "<form class='row g-2' action='placement_table.php' method='GET'>";
echo "<div class='col-auto'>";
echo "<button type='submit' class='btn btn-primary mb-3'>Display Table</button>";
echo "</div>";
echo "</form>";

    // ?>
  </body>
</html>

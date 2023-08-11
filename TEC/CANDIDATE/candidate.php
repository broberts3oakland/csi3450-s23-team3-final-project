<!DOCTYPE html>
<!-- test_get.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Log Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php
require_once('../database.php');
require_once('../redo_tables.php');
$conn = Connect_to_Database();
Create_All_Tables($conn);

$Table_Name = "CANDIDATE";

$Table_Signature = [
  "CANDIDATE_ID" => " CANDIDATE_ID,",
  "FIRST_NAME" => "FIRST_NAME,",
  "LAST_NAME" => "LAST_NAME",
  "AGE" => "AGE",
  "SOCIAL_SECURITY" => "SOCIAL_SECURITY",
  "DATE_OF_REGRISTRATION" => "DATE_OF_REGRISTRATION)"
];

$Values_from_UI = [$_GET['Candidate_ID'], $_GET['First_Name'], $_GET['Last_Name'], 
                $_GET['Age'], $_GET['Social_Security'], $_GET['Date_of_Regristration']];

// Make sure there's a space and comma after each value. Last value won't be affected
$Values_as_Single_String =  implode(", ",$Values_from_UI);

$Boolean_of_Inserting_Values = Insert_Values_Into_Table($conn, $Table_Name, $Table_Signature, $Values_as_Single_String);

Print_Input($Boolean_of_Inserting_Values, $Values_as_Single_String);


echo "<form class='row g-2' action='placement_table.php' method='GET'>";
echo "<div class='col-auto'>";
echo "<button type='submit' class='btn btn-primary mb-3'>Display Table</button>";
echo "</div>";
echo "</form>";

    // ?>
  </body>
</html>

<?php
function Create_All_Tables($conn)
{

    $sql = "CREATE TABLE IF NOT EXISTS CANDIDATE(
        CANDIDATE_ID INT(32),
        FIRST_NAME VARHCHAR(30),
        LAST_NAME VARHCHAR(30),
        AGE INT(32),
        DATE_OF_REGRISTRATION DATE,
        JOB_HISTORY INT,
        COURSE_TAKING INT,
        QUALIFICATIOIN_CODE INT
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
      
      CREATE TABLE IF NOT EXISTS COMPANY(
        COMPANY_ID INT,
        COMPANY_TEXT VARHCHAR(50),
        EMPLOYEES_REQUESTING INT,
        OPENING_ID INT
        ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

        CREATE TABLE IF NOT EXISTS COURSE(
        COURSE_ID INT,
        SESSION_ID INT,
        PREREQUISITES VARCHAR(50),
        QUALIFICATIOIN_CODE VARCHAR(50)
        ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

        CREATE TABLE IF NOT EXISTS JOB_HISTORY(
        CANDIDATE_ID INT,
        PAST_JOB VARCHAR(50),
        ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

        
      
      
        ";

    if ($conn->multi_query($sql) === TRUE) 
    {
    echo "All tables created successfully";
    } else 
    {
    echo "<br> Couldn't create all tables: " . $conn->error;
    }


}
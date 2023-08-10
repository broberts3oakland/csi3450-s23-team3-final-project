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
      QUALIFICATIOIN_CODE INT,
      PRIMARY KEY (CANDIDATE_ID)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    
    CREATE TABLE IF NOT EXISTS COMPANY(
      COMPANY_ID INT,
      COMPANY_TEXT VARHCHAR(50),
      EMPLOYEES_REQUESTING INT,
      OPENING_ID INT
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

      CREATE TABLE IF NOT EXISTS COURSE(
      COURSE_ID INT(32),
      SESSION_ID INT(32),
      PREREQUISITES VARCHAR(50),
      QUALIFICATIOIN_CODE VARCHAR(50)
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

      CREATE TABLE IF NOT EXISTS JOB_HISTORY(
      CANDIDATE_ID INT,
      PAST_JOB VARCHAR(50),
      PRIMARY KEY (CANDIDATE_ID)
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


      
      CREATE TABLE IF NOT EXISTS OPENING(
      OPENING_NUMBER INT(32),
      COMPANY_ID INT,
      COMPANY_NAME VARCHAR(200),
      STARTING_DATE DATE,
      MAIN_QUALIFICATION VARCHAR(11),
      REQUIRED_QUALIFCATIONS INT,
      PRIMARY KEY (OPENING_NUMBER)

      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


      CREATE TABLE IF NOT EXISTS QUALIFICATION(
      QUALIFICATIOIN_CODE VARCHAR(50),
      COURSE_ID INT(32),
      QUALIFICATION_DESCRIPTION VARCHAR(200)
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

      CREATE TABLE IF NOT EXISTS SESSION(
      SESSION_ID INT(32),
      COURSE_ID INT(32),
      TOTAL_ENROLLED INT,
      TOTAL_FEES FLOAT,
      MAX_CAPACITY INT
      ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

      CREATE TABLE IF NOT EXISTS PLACEMENT(
        OPENING_NUMBER INT(32),
        CANDIDATE_ID INT(32),
        TOTAL_HOURS_WORKED FLOAT,
        PRIMARY KEY(OPENING_NUMBER)
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
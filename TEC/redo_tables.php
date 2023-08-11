
<?php
function Create_All_Tables($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS CANDIDATE(
        CANDIDATE_ID INT(32) UNIQUE NOT NULL,
        FIRST_NAME VARCHAR(30),
        LAST_NAME VARCHAR(30),
        AGE INT(32),
        SOCIAL_SECURITY VARCHAR(12),
        DATE_OF_REGRISTRATION DATE,
        PRIMARY KEY (CANDIDATE_ID)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS COMPANY(
        COMPANY_ID INT(32) UNIQUE NOT NULL,
        COMPANY_NAME VARCHAR(200),
        PRIMARY KEY (COMPANY_ID)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS COURSE(
        COURSE_ID INT(32),
        CURRENTLY_OFFERED BIT,
        PRIMARY KEY(COURSE_ID)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS JOB_HISTORY(
        CANDIDATE_ID INT(32),
        PAST_JOB VARCHAR(50),
        PRIMARY KEY (CANDIDATE_ID)
        ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS OPENING(
        OPENING_ID INT(32),
        COMPANY_ID INT(32),
        STARTING_DATE DATE,
        SPOTS_OPEN INT,
        MAIN_QUALIFICATION VARCHAR(11),
        REQUIRED_QUALIFCATIONS INT,
        PRIMARY KEY (OPENING_ID)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS QUALIFICATION(
        QUALIFICATION_CODE VARCHAR(20) UNIQUE,
        CANDIDATE_ID INT(32),
        DESCRIPTION VARCHAR(200),
        PRIMARY KEY (QUALIFICATION_CODE)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS SESSION(
            SESSION_ID INT(32),
            COURSE_ID INT(32),
            TOTAL_ENROLLED INT,
            TOTAL_FEES FLOAT,
            MAX_CAPACITY INT,
            STARTING_TIME TIMESTAMP,
            END_TIME TIMESTAMP,
            PRIMARY KEY (SESSION_ID)
        ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS PLACEMENT(
        CANDIDATE_ID INT(32),
        OPENING_ID INT(32),
        TOTAL_HOURS_WORKED FLOAT,
        PRIMARY KEY(CANDIDATE_ID, OPENING_ID)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE IF NOT EXISTS Prerequisite(
        Prerequisite_ID INT(32),
        QUALIFICATION_CODE VARCHAR(20),
        COURSE_ID INT(32),
        PRIMARY KEY (Prerequisite_ID)
    ) Engine=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


    CREATE TABLE IF NOT EXISTS Certified(
        CANDIDATE_ID INT(32),
        QUALIFICATION_CODE VARCHAR(20),
        PRIMARY KEY(CANDIDATE_ID, QUALIFICATION_CODE)
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
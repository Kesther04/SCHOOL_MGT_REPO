<?php 

require("school_database_connection.php");

$database = $con->query("CREATE DATABASE if not exists SCHOOL");

if ($database) {
    print("database created");
}

$tb = $con->query("CREATE TABLE if not exists student_registration
(ID int(120)not null primary key auto_increment,
FULLNAME varchar(120)not null,
CLASS varchar(120)not null,
LEVEL varchar(120)not null,
REG_NO varchar(120)not null,
SESSION_YEAR varchar(120)not null,
GENDER varchar(120)not null,
DOB varchar(120)not null,
STATE_OF_ORI varchar(120)not null,
STU_ADD varchar(120)not null,
PA_GU varchar(120)not null,
PA_GU_CON varchar(120)not null)ENGINE=innoDB");


$tab = $con->query("CREATE TABLE if not exists student_result
(ID int(120)not null primary key auto_increment,
FULLNAME varchar(120)not null,
CLASS varchar(120)not null,
REG_NO varchar(120)not null,
SESSION_YEAR varchar(120)not null,
TERM varchar(120)not null,
SUBJECT varchar(120)not null,
SUBJECT_NO varchar(10)not null,
FIRST_ASS varchar(120)not null,
SEC_ASS varchar(120)not null,
THIRD_ASS varchar(120)not null,
TOTAL_ASSESSMENT_SCORE varchar(120)not null,
EXAM_SCORE varchar(120)not null,
SUBJECT_TOTAL_SCORE varchar(120)not null,
SUBJECT_GRADE varchar(120)not null,
SUBJECT_REMARK varchar(120)not null,
GENERAL_TOTAL_SCORE varchar(120)not null,
AVERAGE varchar(120)not null,
GRADE varchar(120)not null,
TOTAL_SUBJECT_NO varchar(120)not null,
REMARK varchar(120)not null)ENGINE=innoDB");

if ($tab) {
    echo "table successful";
}else {
    echo "no table unsuccessful";
}


$tottab = $con->query("CREATE TABLE if not exists totality
(ID int(120)not null primary key auto_increment,
FULLNAME varchar(120)not null,
CLASS varchar(120)not null,
REG_NO varchar(120)not null,
SESSION_YEAR varchar(120)not null,
TERM varchar(120)not null,
GENERAL_TOTAL_SCORE varchar(120)not null,
AVERAGE varchar(120)not null,
POSITION varchar(120)not null,
GRADE varchar(120)not null,
TOTAL_SUBJECT_NO varchar(120)not null,
REMARK varchar(120)not null)ENGINE=innoDB");
if ($tottab) {
    print("<p>tottable created</p>");
}else {
    print("<p>tottable not created</p>");
}

$pt = $con->query("CREATE TABLE if not exists pin_table
(ID int(80)not null primary key auto_increment,
STUDENT_PIN varchar(120)not null,
DATE varchar(120)not null,
TIME varchar(120)not null)ENGINE=innoDB");
if ($pt) {
    print("pin table created");
}else {
    print("pin table not created");
}

$tabl = $con->query("CREATE TABLE if not exists result_checks
(ID int(80)not null primary key auto_increment,
STUDENT_NAME varchar(120)not null,
REG_NO varchar(120)not null,
CLASS varchar(120)not null,
SESSION_YEAR varchar(120)not null,
TERM varchar(120)not null,
PIN varchar(120)not null,
DATE varchar(120)not null,
TIME varchar(120)not null)ENGINE=innoDB");
if ($tabl) {
    print("pin result table created");
}else {
    print("pin result table not created");
}


$postab = $con->query("CREATE TABLE if not exists position
(ID int(80)not null primary key auto_increment,
AVERAGE varchar(120)not null,
REG_NO varchar(120)not null,
POSITION varchar(120)not null)ENGINE=innoDB");
?>
<?php 
session_start(); 
if ($_SERVER['REQUEST_METHOD']=="POST") {

    $sname = $_POST['sname'];
    $reg = $_POST['reg'];
    $class = $_POST['class'];
    $sess = $_POST['sess'];
    $term = $_POST['term'];
    $pin = $_POST['pin'];
    $date = date("d/m/y");
    $hour = date("h")+1;
    $time = date("$hour:i:s.a");

    require("school_database_connection.php");

    $sele = $con->query("SELECT * FROM student_registration WHERE REG_NO='$reg' AND SESSION_YEAR='$sess'");
    if ($sele) {
        $sout=$sele->fetch_assoc();
        $sudreg=$sout['REG_NO'];
        $sudses=$sout['SESSION_YEAR'];
        
    }
    // check valid pin
    $select = $con->query("SELECT * FROM pin_table WHERE STUDENT_PIN='$pin' ");
    if ($select) {
        $bot=$select->fetch_assoc();
        $bpin=$bot['STUDENT_PIN'];
        
    }

    $sel = $con->query("SELECT * FROM result_checks WHERE PIN = '$pin' ");
    if ($sel->num_rows > 0) {
        $dot=$sel->fetch_assoc();
        $dpot=$dot['PIN'];
        $sudnam=$dot['STUDENT_NAME'];
        $regi=$dot['REG_NO'];
        $seso=$dot['SESSION_YEAR'];
        $teri=$dot['TERM'];
        $clad=$dot['CLASS'];
       
    }
   
    if ($sudreg!==$reg AND $sudses!==$sess) {
        //to check if the student is a candidate
        header("location:check_result.php?msg=sorry your not a candidate");
    }
    elseif ($bpin!=$pin) {
        //to check if the pin is valid
        header("location:check_result.php?msg=pin invalid");
    }
    elseif ($sel->num_rows >= 5) {
        //to limit the particular pin can be used
        header("location:check_result.php?msg=you have exceeded the  usage amount for this pin");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND  $regi!==$reg AND $seso!==$sess AND $teri!==$term AND $clad!==$class) {
        //to check if the pin has been used
        header("location:check_result.php?msg=this pin has been used");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso==$sess AND $teri!==$term AND $clad==$class) {
        //to check if the term is incorrect
        header("location:check_result.php?msg=incorrect term");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso==$sess AND $teri==$term AND $clad!==$class) {
        //to check if the class is incorrect
        header("location:check_result.php?msg=incorrect class");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso!==$sess AND $teri==$term AND $clad==$class) {
        //to check if the session is incorrect
        header("location:check_result.php?msg=incorrect session");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot  AND $regi!==$reg AND $seso==$sess AND $teri==$term AND $clad==$class) {
        //to check if the registration number is incorrect
        header("location:check_result.php?msg=incorrect registration number");
    }else{
        //to insert if the above are not true
        $insert = $con->query("INSERT INTO result_checks(STUDENT_NAME,REG_NO,CLASS,SESSION_YEAR,TERM,PIN,DATE,TIME)VALUE('$sname','$reg','$class','$sess','$term','$pin','$date','$time')");
        if ($insert) {    
        require("results.php");
        }
    }

}

?>
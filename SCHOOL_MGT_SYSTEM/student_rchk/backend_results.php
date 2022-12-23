<?php 
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

    require("../d_con/school_database_connection.php");

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
        $usa=$bot['USAGE_AMOUNT'];
        $paic=$usa+1;
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
        header("location:check_result.php?msg=the pin has been used with another term");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso==$sess AND $teri==$term AND $clad!==$class) {
        //to check if the class is incorrect
        header("location:check_result.php?msg=the pin has been used with another class");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso==$sess AND $teri!==$term AND $clad!==$class) {
        //to check if the class and term is incorrect
        header("location:check_result.php?msg=the pin has been used with another term and class");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi!==$reg AND $seso==$sess AND $teri==$term AND $clad!==$class) {
        //to check if the class and reg no is incorrect
        header("location:check_result.php?msg=the pin has been used with another registration number and class");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi!==$reg AND $seso==$sess AND $teri!==$term AND $clad==$class) {
        //to check if the term and reg no is incorrect
        header("location:check_result.php?msg=the pin has been used with another term and registration number");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi!==$reg AND $seso==$sess AND $teri!==$term AND $clad!==$class) {
        //to check if the class, term and reg no is incorrect
        header("location:check_result.php?msg=the pin has been used with other credentials");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso!==$sess AND $teri!==$term AND $clad!==$class) {
        //to check if the class, term and session is incorrect
        header("location:check_result.php?msg=the pin has been used with other credentials");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi!==$reg AND $seso!==$sess AND $teri==$term AND $clad!==$class) {
        //to check if the class, session and reg no is incorrect
        header("location:check_result.php?msg=the pin has been used with other credentials");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi!==$reg AND $seso!==$sess AND $teri!==$term AND $clad==$class) {
        //to check if the session, term and reg no is incorrect
        header("location:check_result.php?msg=the pin has been used with other credentials");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso!==$sess AND $teri==$term AND $clad==$class) {
        //to check if the session is incorrect
        header("location:check_result.php?msg=the pin has been used with another session");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso!==$sess AND $teri==$term AND $clad!==$class) {
        //to check if the session and class is incorrect
        header("location:check_result.php?msg=the pin has been used with another session and class");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi==$reg AND $seso!==$sess AND $teri!==$term AND $clad==$class) {
        //to check if the session and term is incorrect
        header("location:check_result.php?msg=the pin has been used with another session and term");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot AND $regi!==$reg AND $seso!==$sess AND $teri==$term AND $clad==$class) {
        //to check if the session and reg no  is incorrect
        header("location:check_result.php?msg=the pin has been used with another session and registration number");
    }
    elseif ($sel->num_rows > 0 AND $pin==$dpot  AND $regi!==$reg AND $seso==$sess AND $teri==$term AND $clad==$class) {
        //to check if the registration number is incorrect
        header("location:check_result.php?msg=incorrect registration number");
    }else{
        //to insert if the above are not true
        $insert = $con->query("INSERT INTO result_checks(STUDENT_NAME,REG_NO,CLASS,SESSION_YEAR,TERM,PIN,DATE,TIME)VALUE('$sname','$reg','$class','$sess','$term','$pin','$date','$time')");
        if ($insert) {    
        
        $up = $con->query("UPDATE pin_table SET USAGE_AMOUNT='$paic',USG_DATE='$date',USG_TIME='$time' WHERE STUDENT_PIN='$pin' ");

        require("results.php");
        }
    }

}

?>
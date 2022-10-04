<?php
if ($_SERVER['REQUEST_METHOD']="POST") {
    $full = $_POST['full'];
    $class = $_POST['class'];
    $reg = $_POST['reg'];
    $sess = $_POST['sess'];
    $term = $_POST['term'];
    $sub = $_POST['sub'];
    $fir = $_POST['fir'];
    $sec = $_POST['sec'];
    $thi = $_POST['thi'];
    $tas = $fir+$sec+$thi;
    $exam = $_POST['exam'];
    $gts = $exam+$tas;
    $gd = grad($gts);
    $rm = ren($gts);
    $date = date("d/m/y");
    $hor = date("h")+1;
    $time = date("$hor:i:s.a");
    
    

    require("school_database_connection.php");

    
    $sel = $con->query("SELECT GENERAL_TOTAL_SCORE, SUBJECT_NO, SUM(GENERAL_TOTAL_SCORE),SUM(SUBJECT_NO) FROM student_result WHERE REG_NO='$reg'");
    if ($sel) {
        $duke = $sel->fetch_assoc();
        $ots = $duke['SUM(GENERAL_TOTAL_SCORE)']+$gts;
        $subno = $duke['SUM(SUBJECT_NO)']+1;
        $avr = ($ots/$subno);
        $mg = maingrad($avr);
        $mrk = mainren($avr);

    }

    $insert = $con->query("INSERT INTO student_result
    (FULLNAME,CLASS,REG_NO,SESSION_YEAR,TERM,SUBJECT,SUBJECT_NO,TOTAL_ASSESSMENT_SCORE,EXAM_SCORE,GENERAL_TOTAL_SCORE,GRADE,REMARK,OVERALL_TOTAL_SCORE,TOTAL_SUBJECT_NO,OVERALL_AVERAGE,OVERALL_REMARK,POSITION,MAIN_GRADE)VALUE('$full','$class','$reg','$sess','$term','$sub','1','$tas','$exam','$gts','$gd','$rm','$ots','$subno',round('$avr',2),'$mrk','','$mg')");
    if ($insert) {
    
    $up = $con->query("UPDATE student_result SET OVERALL_TOTAL_SCORE='$ots',TOTAL_SUBJECT_NO='$subno',OVERALL_AVERAGE=round('$avr',2),OVERALL_REMARK='$mrk',MAIN_GRADE='$mg' WHERE REG_NO ='$reg'");

    $pan = pint();
    $lan = let();
    $splan=$pan.$lan;

    $ins = $con->query("INSERT INTO pin_table(STUDENT_PIN,DATE,TIME)VALUE('$splan','$date','$time')");
    
    header("location:admin_result_system.php?msg='RESULT UPLOADED'");
    
    }else {
        header("location:admin_result_system.php?msg='RESULT NOT UPLOADED'");
    }
    
    
}


function grad($grd){
    $grade = "";
    if ($grd < 40) {
        $grade = "F";
    }
    elseif ($grd < 50) {
        $grade = "P";
    }
    elseif ($grd < 65) {
        $grade = "C";
    }
    elseif ($grd < 75) {
        $grade = "B";
    }else {
        $grade = "A";
    }
    return $grade;
}


function ren($grd){
    $rem = "";
    if ($grd < 40) {
        $rem = "FAIL";
    }
    elseif ($grd < 50) {
        $rem = "PASS";
    }
    elseif ($grd < 65) {
        $rem = "CREDIT";
    }
    elseif ($grd < 75) {
        $rem = "VERY_GOOD";
    }else {
        $rem = "EXCELLENT";
    }
    return $rem;
}


function maingrad($ave){
    $maingrade = "";
    if ($ave < 40) {
        $maingrade = "F";
    }
    elseif ($ave < 50) {
        $maingrade = "P";
    }
    elseif ($ave < 65) {
        $maingrade = "C";
    }
    elseif ($ave < 75) {
        $maingrade = "B";
    }else {
        $maingrade = "A";
    }
    return $maingrade;
}


function mainren($ave){
    $mainrem = "";
    if ($ave < 40) {
        $mainrem = "FAIL";
    }
    elseif ($ave < 50) {
        $mainrem = "PASS";
    }
    elseif ($ave < 65) {
        $mainrem = "CREDIT";
    }
    elseif ($ave < 75) {
        $mainrem = "VERY_GOOD";
    }else {
        $mainrem = "EXCELLENT";
    }
    return $mainrem;
}



function pint(){
    $len = 7;
    $char = '1234567890';
    $pin = '';
    
    for ($i=0; $i <=$len; $i++) {
       @$pin.=$char[mt_rand(0,strlen($char))];
    }
    return $pin;
}
 
 
function let(){
    $lent = 2;
    $chara = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pina = '';
 
    for ($a=0; $a < $lent; $a++) { 
       @$pina.=$chara[mt_rand(0,strlen($chara))];
    }
    return $pina;
}
 

?>
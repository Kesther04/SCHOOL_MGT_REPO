<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    
    require("school_database_connection.php");

    $sel = $con->query(" SELECT * FROM student_result WHERE  CLASS='$_POST[class]' AND TERM = '$_POST[term]' AND  SESSION_YEAR='$_POST[sess]' GROUP BY REG_NO  ORDER BY (AVERAGE)DESC ");
    if ($sel) {
        while ($dow = $sel->fetch_assoc()) {
            $fn=$dow['FULLNAME'];
            $class=$dow['CLASS'];
            $term=$dow['TERM'];
            $reg=$dow['REG_NO'];
            $gts=$dow['GENERAL_TOTAL_SCORE'];
            $ave=$dow['AVERAGE'];
            $tsn=$dow['TOTAL_SUBJECT_NO'];
            $rem=$dow['REMARK'];
            $pos=$dow['POSITION'];
            $rad[]=$reg;
            $rod[]=$ave;
            $posrod=1;
            $grd=$dow['GRADE'];
            $sess=$dow['SESSION_YEAR'];

        }

        echo $rodno=count($rod);
        echo "<br>";
        for($posrod=1; $posrod<=$rodno; $posrod++){
             $pad=$rad[$posrod-1];
             "|";
             $tog=$rod[$posrod-1];
             "|";
             $posrod;
             "<br>";
            
        if ($tog) {
                
            $up = $con->query("UPDATE student_result SET POSITION = '$posrod' WHERE CLASS='$class' AND AVERAGE = '$tog' AND REG_NO='$pad' ");
                if ($up) { 
                    require("admin_class_results.php"); 
                }   
        }
        
        }

        
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="results.css" media="all">
    <link rel="stylesheet" href="results_three.css" media="all">
    <title>RESULT</title>
   
</head>
<body>


<?php if ($_SERVER['REQUEST_METHOD']=="POST") { ?>

<?php require("school_database_connection.php");  ?>
<div class="man-div-container">

<?php

$sel = $con->query("SELECT * FROM student_result WHERE REG_NO='$_POST[reg]' AND  CLASS='$_POST[class]' AND TERM = '$_POST[term]' AND  SESSION_YEAR='$_POST[sess]'  GROUP BY REG_NO");
if ($sel) {
while ($dow=$sel->fetch_assoc()) {

?>


<div style="width:10%;float:left;">
    <img src="pic/logo2.png" style="width:150px;float:left;">
</div>
<h1>BRITISH SPRING COLLEGE<br>STUDENT RESULT</h1>


<div class="beat">
<table>

<tr>
    <td>STUDENT NAME</td><td><?php echo $dow['FULLNAME']; ?></td>
    <td>CLASS</td><td><?php echo $dow['CLASS']; ?></td> 
</tr>

<tr>
    <td>TERM</td><td><?php echo $dow['TERM']; ?></td>
    <td>REGISTRATION NUMBER</td><td><?php echo $dow['REG_NO']; ?></td>
</tr>

<tr>
    <td>GENERAL TOTAL</td><td><?php echo $dow['OVERALL_TOTAL_SCORE']; ?></td>
    <td>AVERAGE</td><td><?php echo $dow['OVERALL_AVERAGE']; ?></td>
</tr>


<tr>
    <td>NO. OF SUBJECTS:</td><td><?php echo $dow['TOTAL_SUBJECT_NO']; ?></td>
    <td>REMARKS</td><td><?php echo $dow['OVERALL_REMARK']; ?></td>
</tr>


<tr>
    <td>POSITION</td><td><?php echo $dow['POSITION']; ?></td>
    <td>GRADE</td><td><?php echo $dow['MAIN_GRADE']; ?></td>
</tr>

</table>
</div>



<?php  
$sel = $con->query("SELECT * FROM student_result WHERE REG_NO='$_POST[reg]' AND  CLASS='$_POST[class]' AND TERM = '$_POST[term]' AND  SESSION_YEAR='$_POST[sess]'  ");
if ($sel) { ?>


<table>
    <tr>
        <td>SUBJECT</td>
        <td>ASS. (30%)</td> 
        <td>EXAM(70%)</td> 
        <td>TOTAL(100%)</td> 
        <td>GRADE</td> 
        <td>REMARK</td>
    </tr>

    <?php while ($duw=$sel->fetch_assoc()) { ?>

    <tr>
        <td><?php echo $duw['SUBJECT']; ?></td>
        <td><?php echo $duw['TOTAL_ASSESSMENT_SCORE']; ?></td> 
        <td><?php echo $duw['EXAM_SCORE']; ?></td>
        <td><?php echo $duw['GENERAL_TOTAL_SCORE']; ?></td> 
        <td><?php echo $duw['GRADE']; ?></td> 
        <td><?php echo $duw['REMARK']; ?></td> 
    </tr>


    <?php   } ?>
</table>

<?php } ?>


<p><?php echo $dow['SESSION_YEAR']; ?></p>


<?php } }  ?>
</div>

<?php } ?>

    <div class="prn-but">
        <button onclick="window.print()" style="padding:10px;border-radius:10px;">PRINT</button>
    </div>

</body>
</html>
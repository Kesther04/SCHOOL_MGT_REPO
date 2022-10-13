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





<?php require("school_database_connection.php");  ?>

<?php

$sel = $con->query("SELECT * FROM student_result WHERE  CLASS='$_POST[class]' AND TERM = '$_POST[term]' AND  SESSION_YEAR='$_POST[sess]' GROUP BY REG_NO ORDER BY (AVERAGE)DESC ");
if ($sel) {


?>

<div class="man-div-container">



<div>
<table>

<tr>
    <td>STUDENT_NAME</td>
    <td>CLASS</td>
    <td>TERM</td>
    <td>REG_NO.</td>
    <td>SESSION_YEAR</td>
    <td>GENERAL_TOTAL</td>
    <td>AVERAGE</td>
    <td>POSITION</td>
    <td>GRADE</td>
</tr>

<?php 
    while ($dow=$sel->fetch_assoc()) {
?>
<tr>
    <td><?php echo $dow['FULLNAME']; ?></td>
    <td><?php echo $dow['CLASS']; ?></td> 
    <td><?php echo $dow['TERM']; ?></td>
    <td><?php echo $dow['REG_NO']; ?></td>
    <td><?php echo $dow['SESSION_YEAR']; ?></td>
    <td><?php echo $dow['GENERAL_TOTAL_SCORE']; ?></td>
    <td><?php echo $dow['AVERAGE']; ?></td>
    <td><?php echo $dow['POSITION']; ?></td>
    <td><?php echo $dow['GRADE']; ?></td>

</tr>

<?php  } ?>
</table>
</div>

</div>



<?php  }  ?>



    <div class="prn-but">
        <button onclick="window.print()" style="padding:10px;border-radius:10px;">PRINT</button>
    </div>

</body>
</html>
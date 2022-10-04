<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_school.css" media="all">
    <link rel="stylesheet" href="admin_school_three.css" media="all">
    <link rel="stylesheet" href="admin_school_sev.css" media="all">
    <title>RESULT FORM</title>
</head>
<body>

<?php require("admin_dashboard_layout.php");?>


<div class="main-div-container">

<form name="myform" method="post" action="admin_results.php">

<div class="sec-div-container">
<h1 style="text-align:center;" >FILL IN YOUR CREDENTIALS</h1>

<table width="100%">

<tr>
    
    <td>
        <span>STUDENT REG. NO.:</span>
        <input type="text" name="reg" required >
    </td>
    
    <td>
    <span>CLASS:</span>
    <select name="class" required>
        <option></option>
        <option>JS1</option>
        <option>JS2</option>
        <option>JS3</option>
        <option>SS1</option>
        <option>SS2</option>
        <option>SS3</option>
    </select>
    </td>
    
</tr>

<tr>
    <td>
        <span>SESSION YEAR:</span> 
        <select name="sess" required>
            <option></option>
    <?php   
    require("school_database_connection.php");
    $sel = $con->query("SELECT * FROM student_result GROUP BY SESSION_YEAR ");
    if ($sel) {
        while($duu = $sel->fetch_assoc()){
            echo "<option>$duu[SESSION_YEAR]</option>";
        }
    } 
    ?>
        </select>
    </td>

    <td><span>TERM:</span> 
        <select name="term" required>
            <option></option>
            <option>1ST TERM</option>
            <option>2ND TERM</option>
            <option>3RD TERM</option>
        </select></td>

    
</tr>



</table>


<div class="con-btn-div">
    <button class="con-btn">CHECK RESULT</button>
</div>

</div>
</form>

</div>

</body>
</html>
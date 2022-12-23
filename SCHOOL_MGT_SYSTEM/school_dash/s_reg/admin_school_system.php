<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $full = $_POST['last'].' '. $_POST['first'].' '.$_POST['mid'];
    $class = $_POST['class'];
    $level = $_POST['level'];
    if($class == "JS1"){
        $level = 'JUNIOR YEAR';
    }
    elseif($class == "JS2"){
        $level = 'JUNIOR YEAR';
    }
    elseif($class == "JS3"){
        $level = 'JUNIOR YEAR';
    }else {
        $level = 'SENIOR YEAR';
    }
    $reg = $_POST['reg'];
    $sess = $_POST['sess'];
    $gen = $_POST['gen'];
    $dob = $_POST['day'].'/'.$_POST['mon'].'/'.$_POST['year'];
    $state = $_POST['state'];
    $stadd = $_POST['stadd'];
    $pg = $_POST['pg'];
    $pgn = $_POST['pgn'];

    require("../../d_con/school_database_connection.php");

    $insert = $con->query("INSERT INTO student_registration
    (FULLNAME,CLASS,LEVEL,REG_NO,SESSION_YEAR,GENDER,DOB,STATE_OF_ORI,STU_ADD,PA_GU,PA_GU_CON)VALUE('$full','$class','$level','$reg','$sess','$gen','$dob','$state','$stadd','$pg','$pgn')");
    if ($insert) {
        header("location:admin_school_system.php?msg='STUDENT REGISTERED'");
    }else {
        header("location:admin_school_system.php?msg='STUDENT NOT  REGISTERED'");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin_school.css" media="all">
    <link rel="stylesheet" href="../../css/admin_school_three.css" media="all">
    <link rel="stylesheet" href="../../css/admin_school_sev.css" media="all">
    <title>STUDENT REGISTRATION</title>
</head>
<body>

<?php require("../../dash_b/admin_dashboard_layout.php")?>

<div class="main-div-container">

<form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<div class="sec-div-container">
<h1 style="text-align:center;" >SCHOOL MANAGEMENT</h1>

<h3 style="text-align:center;">STUDENT DETAILS</h3>
<table width="100%">
<tr> <td><span>FIRST NAME:</span><input type="text"  name="first" required></td> 
    <td><span>LAST NAME:</span><input type="text"  name="last" required></td>  
    <td><span>MIDDLE NAME:</span><input type="text"  name="mid" required></td> 
</tr>

<tr>
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
    
    <td><span>REG. NO.:</span><input type="text" name="reg" required></td>

    <td><span>SESSION YEAR:</span> <input type="text" name="sess" required></td>
</tr>

<tr>
    
    
    <td>
    <span>GENDER:</span>
    <select name="gen" required>
    <option></option>
    <option>MALE</option>
    <option>FEMALE</option>
    </select>
   
    </td>
    
    <td>
    <span>DATE OF BIRTH:</span>
    <span id="ree">
            DAY:
        <select name="day" required>
            <option></option>
            <?php 
            for ($a=1; $a <=31 ; $a++) { ?>
            <option><?php echo $a; ?></option>
            <?php } ?>
        </select>
        </span>
    <span id="ree">
        MONTH:
        <select name="mon" required>
            <option></option>
            <?php 
            for ($a=1; $a <=12 ; $a++) { ?>
            <option><?php echo $a; ?></option>
            <?php } ?>
        </select>
    </span>
       
        <span id="ree">
            YEAR:
        <select name="year" required>
            <option></option>
            <?php 
            for ($a=2022; $a >=1992 ; $a--) { ?>
            <option><?php echo $a; ?></option>
            <?php } ?>
        </select>
        </span>
    
    </td>

    <input type="hidden" name="status" readonly>

    <td>
    
    <span>STATE OF ORIGIN:</span>    
    
    <select name="state" required>
    <option></option> 
    <option>EBONYI STATE</option> 
    <option>ENUGU STATE</option> 
    <option>ANAMBRA STATE</option> 
    <option>ABIA STATE</option>
    <option>SOKOTO STATE</option> 
    <option>IMO STATE</option> 
    <option>BENUE STATE</option> 
    <option>ABUJA (FCT)</option> 
    <option>NIL</option>
    </select> </td> 
   
</tr>


<tr>
    
    <td> <span>STUDENT ADDRESS:</span> <input type="text"  name="stadd" required></td> 
    
    <td> <span>PARENT/GUARDIAN:</span> <input type="text"  name="pg" required></td> 

    <td> <span>PARENT/GUARDIAN CONTACT:</span> <input type="text"  name="pgn" required></td> 

</tr>
</table>



<div class="con-btn-div">
<button class="con-btn">REGISTER</button></div>

</div>

</form> 


</div>

</body>
</html>
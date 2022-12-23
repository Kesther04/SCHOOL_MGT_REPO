<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin_school.css" media="all">
    <link rel="stylesheet" href="../../admin_school_three.css" media="all">
    <link rel="stylesheet" href="../../admin_school_sev.css" media="all">
    <title>RESULT UPLOAD</title>
</head>
<body>
<?php require("../../dash_b/admin_dashboard_layout.php")?>

<div class="main-div-container">
   
<form name="myform" method="post" action="junior_result_form.php">

<div class="sec-div-container">
<h1 style="text-align:center;" >RESULT UPLOAD</h1>

<h3 style="text-align:center;">STUDENT DETAILS</h3>
<table width="100%">
<tr> 
    <td><span>FULLNAME:</span><input type="text" value=""    name="full" required></td>  

    <td>
    <span>CLASS:</span>
    <select name="class" required>
        <option></option>
        <option>JS1</option>
        <option>JS2</option>
        <option>JS3</option>
    </select>
    </td>
    
    <td><span>REG. NO.:</span><input type="text" name="reg" value=""  required></td>
</tr>

<tr>
    <td><span>SESSION YEAR:</span> <input type="text" name="sess" value=""   required></td>

    <td><span>TERM:</span> 
        <select name="term" required>
            <option></option>
            <option>1ST TERM</option>
            <option>2ND TERM</option>
            <option>3RD TERM</option>
        </select></td>

    
        <td>
        <span>SUBJECT:</span>
    <select name="sub" required>
        <option></option>
        <option>MATHEMATICS</option>
        <option>ENGLISH_LANGUAGE</option>
        <option>BASIC_SCIENCE</option>
        <option>BASIC_TECHNOLOGY</option>
        <option>PHYSICAL_AND_HEALTH_EDUCATION</option>
        <option>AGRICULTURAL_SCIENCE</option>
        <option>HOME_ECONOMICS</option>
        <option>LITERATURE_IN_ENGLISH</option>
        <option>BUSINESS_STUDIES</option>
        <option>CULTURAL_AND_CREATIVE_ART</option>
        <option>CIVIC_EDUCATION</option>
        <option>C.R.S</option>
        <option>COMPUTER_STUDIES</option>
    </select>
    </td>
</tr>


<tr>
    <td>
        <span>FIRST ASSESSMENT:</span>
    <select name="fir" required>
        <option></option>
        <?php for ($fa=0; $fa <= 10; $fa++) { ?>
            <option><?php echo $fa; ?></option>
        <?php } ?>
    </select>
    </td>
    
    <td>
        <span>SECOND ASSESSMENT:</span>
    <select name="sec" required>
        <option></option>
        <?php for ($sa=0; $sa <= 10; $sa++) { ?>
            <option><?php echo $sa; ?></option>
        <?php } ?>
    </select>
    </td>

    <td>
        <span>THIRD ASSESSMENT:</span>
    <select name="thi" required>
        <option></option>
        <?php for ($ta=0; $ta <= 10; $ta++) { ?>
            <option><?php echo $ta; ?></option>
        <?php } ?>
    </select>
    </td>
</tr>

<tr>
    <td>
        <span>EXAM SCORE:</span>
    <select name="exam" required>
        <option></option>
        <?php for ($es=0; $es <= 70; $es++) { ?>
            <option><?php echo $es; ?></option>
        <?php } ?>
    </select>
    </td>
   
</tr>
</table>


<div class="con-btn-div">
    <button class="con-btn">UPLOAD</button>
</div>

</div>
</form>

</div>

</body>
</html>
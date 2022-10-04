<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="check_result.css" media="all">
    <title>PIN</title>
</head>

<body>
    <?php if($_SERVER['REQUEST_METHOD']=="POST"){ ?>
    
    <?php
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
    
    
    ?>
    
    <div>
        <form name="pin-form" action="results.php" method="post">
        <p>PIN:<input type="text" name="pin" required></p>
        
        <input type="hidden" name="sname" value="<?php echo $_POST['sname']; ?>" readonly>
        <input type="hidden" name="reg" value="<?php  echo $_POST['reg']; ?>" readonly>
        <input type="hidden" name="class" value="<?php  echo $_POST['class']; ?>" readonly>
        <input type="hidden" name="sess" value="<?php   echo $_POST['sess']; ?>" readonly>
        <input type="hidden" name="term" value="<?php   echo $_POST['term']; ?>" readonly>

        <p><button>SUBMIT</button></p>
        </form>
    </div>


    <?php } ?>
</body>

</html>
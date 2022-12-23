<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $full = $_POST['full'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pno = $_POST['pno'];
    $date = date("d/m/y");
    $hour = date("h")+1;
    $time = date("$hour:i:s.a");

    require("../d_con/school_database_connection.php");

    $ins = $con->query("INSERT INTO admin_reg(FULLNAME,GENDER,EMAIL_ADDRESS,PASSWORD,PHONE_NUMBER,DATE,TIME)VALUE('$full','$gender','$email','$pass','$pno','$date','$time')");

    if ($ins) {
        header("location:school_admin_login.php");
    }else {
        header("location:school_admin_signup.php?msg='not registered'");
    }
}


?>
<?php

session_start();

if ($_SERVER['REQUEST_METHOD']=="POST") {

    require("school_database_connection.php");

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    if (empty($email)) {
        header("location:school_admin_login.php?msg=ENTER YOUR EMAIL ADDRESS");
    }
    elseif (empty($pass)) {
        header("location:school_admin_login.php?msg=ENTER YOUR PASSWORD");
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("location:school_admin_login.php?msg=INVALID EMAIL ADDRESS");
    }else {
        $sel = $con->query(" SELECT * FROM admin_reg WHERE EMAIL_ADDRESS = '$email' AND PASSWORD = '$pass' ");
        if($sel->num_rows>0){
            $row =$sel->fetch_assoc();
            $_SESSION['id'] = $row['ID'];
            $_SESSION['email'] = $row['EMAIL_ADDRESS'];
            $_SESSION['pass'] = $row['PASSWORD'];
            $_SESSION['name'] = $row['FULLNAME'];
    
            header("location:admin_school_system.php?msg='WELCOME $_SESSION[name]'");
        }else {
            header("location:school_admin_login.php?msg=INCORRECT EMAIL OR PASSWORD");
        }
    }
}

?>
<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $oa = $_POST['oa'];
    $rno = $_POST['rno'];
    

    require("school_database_connection.php");

    $ins = $con->query("INSERT INTO position
    (AVERAGE,REG_NO,POSITION)VALUE('$oa','$rno','1')");
    if ($ins) {
        header("location:pos.php?msg='position calculated'");
    }else{
        header("location:pos.php?msg='no calculation'");
    }

}
?>
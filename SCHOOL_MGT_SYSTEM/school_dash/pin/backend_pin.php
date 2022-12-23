<?php

$date = date("d/m/y");
$hor = date("h")+1;
$time = date("$hor:i:s.a");


require("../../d_con/school_database_connection.php");
$pan = pint();
$lan = let();

$splan=$pan.$lan;

$ins = $con->query("INSERT INTO pin_table(STUDENT_PIN,DATE,TIME,USAGE_AMOUNT,USG_DATE,USG_TIME)VALUE('$splan','$date','$time','0','','')");
if ($ins) {
   header("location:../s_reg/admin_school_system.php?msg='PIN GENERATED'");
}

function pint(){
   $len = 7;
   $char = '1234567890';
   $pin = '';
   
   for ($i=0; $i <=$len; $i++) {
      @$pin.=$char[mt_rand(0,strlen($char))];
   }
   return $pin;
}


function let(){
   $lent = 2;
   $chara = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $pina = '';

   for ($a=0; $a < $lent; $a++) { 
      @$pina.=$chara[mt_rand(0,strlen($chara))];
   }
   return $pina;
}

?>
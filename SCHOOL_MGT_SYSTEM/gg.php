
<?php

require("school_database_connection.php");
$pan = pint();
$lan = let();

$splan=$pan.$lan;

$ins = $con->query("INSERT INTO pin_table(STUDENT_PIN)VALUE('$splan')");
if ($ins) {
   header("location:admin_school_system.php?msg='pin generated'");
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


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <div>
      <form name="pin-form" method ="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <button>GENERATE PIN</button>
      </form>
   </div>
</body>

</html>
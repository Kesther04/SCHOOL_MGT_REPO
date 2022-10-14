<?php

require("school_database_connection.php");


$sel = $con->query("SELECT * FROM student_result GROUP BY REG_NO  ORDER BY (AVERAGE)DESC  ");
if ($sel) {

    while ($row=$sel->fetch_assoc()){
        
        $dep = $row['AVERAGE'];
        
        $rowPos[]=$dep;
        $positionResult=1;
        $positprik=$positionResult;
    }
        rsort($rowPos);
        $positionNumber=count($rowPos);
        for($positionResult=1;$positionResult <= $positionNumber;$positionResult++){
            $pock=$rowPos[$positionResult-1]  .'|'.  $positionResult;
            $prit=$rowPos[$positionResult-1]  .'|'.  $positprik;
          
            echo $pock;
            echo "<br>";
        }

}
  

?>


<?php

echo "<br>";

$numbers = array(101,201,301,301,401,401,408,500,500,1001);
rsort($numbers);

$arrlength = count($numbers);
$rank = 1;
$prev_rank = $rank;

for ($x=0; $x < $arrlength ; $x++) { 
    if ($numbers[$x]==$numbers[0]) {
        echo $numbers[$x].'-->'.($rank);
    }
    elseif ($numbers[$x] != $numbers[$x-1]) {
        $rank++;
        $prev_rank = $rank;
        echo $numbers[$x].'-->'.($prev_rank);
    }else {
        $rank++;
        echo $numbers[$x].'-->'.($prev_rank);
    }
    echo "<br>";
}

?>
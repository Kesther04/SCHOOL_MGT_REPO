<?php
if ($dow['POSITION'] == 1) {
    echo $dow['POSITION'].'st';
}
elseif ($dow['POSITION'] == 2) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 3) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 21) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 22) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 23) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 31) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 32) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 33) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 41) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 42) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 43) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 51) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 52) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 53) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 61) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 62) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 63) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 71) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 72) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 73) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 81) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 82) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 83) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 91) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 92) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 93) { echo $dow['POSITION'].'rd';}
elseif ($dow['POSITION'] == 101) { echo $dow['POSITION'].'st';}
elseif ($dow['POSITION'] == 102) { echo $dow['POSITION'].'nd';}
elseif ($dow['POSITION'] == 103) { echo $dow['POSITION'].'rd';}
else {
    echo $dow['POSITION'].'th';
}


?>
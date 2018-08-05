<?php
include "bsl3.php";




$q = $db->query("SELECT * FROM petty");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[pt_name]<br />";
echo "<b>Name </b> $row[pt_amount]<br />";
echo "<b>Name </b> $row[pt_type]<br />";
$pt_add = $row[pt_amount];
$pt_type = $row[pt_type];
if($pt_type == 'add') { 
$aradd[] = $row[pt_amount]; } 
elseif($pt_type == 'less') { 
$arless[] = $row[pt_amount];
} 

 } 
$totaladd = array_sum($aradd);
$totalless = array_sum($arless);
$total = $totaladd - $totalless;
echo "PETTY CASH BALANCE: $total";
?>
<?php
include "bsl3.php";
$custid = $_SESSION[us];
$foo = $_SERVER[SERVER_NAME];

echo "<div id='mab'><table cellspacing='1' cellpadding='2' border='1'>";

$q = $db->query("SELECT * FROM paymentstb");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<tr><td>Guest</td><td>$row[pa_boolname]</td>";
echo "<td>Name </td><td> $row[pa_name]</td>";
echo "<td>Amount </td><td> $row[pa_amount]</td>";
$tot[] = $row[pa_amount];
echo "<td>Description </td><td> $row[pa_method]</td></tr>";
 } 
$total = array_sum($tot);
echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>TOTAL</td><td>$total</td></tr></table></div>";
?>
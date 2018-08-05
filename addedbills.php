<?php
include "bsl3.php";
$custid = $_SESSION[us];
$foo = $_SERVER[SERVER_NAME];

include "conf.php";

$q = $db->query("SELECT * FROM addtobilltb");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[bill_name]<br />";
echo "<b>Amount </b> $row[bill_amount]<br />";
echo "<b>Booking ID</b> $row[bill_booid]";

echo "<b>Description </b> $row[dis_descp]<br />";
 } 
?>

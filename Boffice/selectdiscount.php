<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";
$q = $db->query("SELECT * FROM discount");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[dis_name]<br />";
echo "<b>Amount </b> $row[dis_amount]<br />";
echo "<b>Description </b> $row[dis_descp]<br />";
 } } else { 
echo "goodness"; } 
?>
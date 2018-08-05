<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";



$q = $db->query("SELECT * FROM salestaxtb");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[ta_name]<br />";
echo "<b>Amount </b> $row[ta_amount]<br />";
echo "<b>Currency Name</b> $row[ta_currname]<br />";
echo "<b>Type </b> $row[ta_type]<br />";
echo "<b>Symbol </b> $row[ta_currsymbol]<br />";
echo "<b>Description </b> $row[ta_descp]<br />";
 } } else { 
echo "goodness"; } 
?>
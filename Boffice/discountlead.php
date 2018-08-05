<?php
session_start();

if(isset($_SESSION[us]) ) { 
include "bsl3.php";

$q = $db->query("SELECT * FROM discount");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[dis_name]<br />";
echo "<a href='selectdiscount.php?id=$row[dis_id]'>View Details</a>|<a href='editdiscount.php?id=$row[dis_id]'>Edit Details</a>|<a href='deletediscount.php?id=$row[dis_id]'>Delete Discount</a><br />"; } } else{ 
echo "goodness"; } 
 
?>
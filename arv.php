<?php
include "conf.php";
$dayt = date("Y-m-d");
echo "ARRIVING TODAY";
$q = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_bfrom = '$dayt' AND boo_status != 'occupied'");

while($rop = $q->fetchArray(SQLITE3_ASSOC) ) { 
$lname = $rop[boo_lname];
$status = $rop[boo_status];
$ac_name = $rop[boo_acname];
echo " $lname $status $ac_name"; } 

 
?>
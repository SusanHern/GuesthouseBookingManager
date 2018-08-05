<?php
include "conf.php";
$qd = $db->query("SELECT * FROM booking WHERE boo_status = 'occupied'");

while($ropd = $qd->fetchArray(SQLITE3_ASSOC) ) { 
$lname = $ropd[boo_lname];

$status = $ropd[boo_status];
$ac_name = $ropd[boo_acname];
echo "<table cellspacing='2' cellpadding='2' style='border:1px solid white;color:white;'><tr><td> $lname</td><td> $status</td><td> $ac_name</td><tr></table>";
 } 
<?php
session_start();
include "bsl3.php";
$name = $_POST[login];
$pass = $_POST[password];
$q = $db->query("SELECT * FROM am WHERE am1 = '$name'");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Hi </b> $row[am1]<br />";

if(md5($pass) === $row[am2]) { 
echo "<b><a href='Boffice/index.php'>Click to proceed</a><br />";
$_SESSION['us'] = $name; } else { 


echo "goodness"; } 
 } 
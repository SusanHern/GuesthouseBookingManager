<?php
include "bsl3.php";
$id = $_REQUEST[id];

echo "<br /><div id='mab'>";
$q = $db->query("SELECT * FROM accomm1 WHERE ac_id = '$id'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo 'NAME : ' . "$ro[ac_name] <br />";
echo 'CAPACITY : ' . "$ro[ac_capacity] <br />";
echo "<div id='Descp'>" . 'FACILITIES : ' . "$ro[ac_facilities] </div><br />";
} 
echo "</div>";
?>
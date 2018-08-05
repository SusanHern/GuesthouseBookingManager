<?php
include "bsl3.php";

echo "<br /><div id='mab'>";
$q = $db->query("SELECT * FROM accomm1");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo 'NAME : ' . "$ro[ac_name] <br />";
echo 'CAPACITY : ' . "$ro[ac_capacity] <br />";
echo "<div id='Descp'>" . 'FACILITIES : ' . "$ro[ac_facilities] </div><br />";
} 
echo "</div>";
?>
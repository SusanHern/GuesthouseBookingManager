<?php
session_start();

include "bsl3.php";

echo "<br /><div id='mab'>";

$q = $db->query("SELECT atc_name, atc_price, atc_singlesupp, atc_id, accomm1.ac_name, accomm1.ac_facilities, accomm1.ac_capacity FROM accommtype JOIN accomm1 ON accommtype.atc_id = accomm1.ac_type");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo 'NAME : ' . "$ro[ac_name] <br />";
echo 'CAPACITY : ' . "$ro[ac_capacity] <br />";
echo 'Rate Type : ' . "$ro[atc_price]<br />";
echo 'Type NAME : ' . "$ro[atc_name]<br />";
echo 'Type SINGLE SUPLEMENT: ' . "$ro[atc_singlesupp]<br />";
echo "<div id='Descp'>" . 'FACILITIES : ' . "$ro[ac_facilities] </div><br />";

} 
echo "</div>"; 
?>
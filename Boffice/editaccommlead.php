<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";


echo "<br /><div id='mab'>";
$q = $db->query("SELECT * FROM accomm1");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo 'NAME : ' . "$ro[ac_name] <br />";
echo "<a href='editaccomm.php?id=$ro[ac_id]'>Edit</a><br />";
} 
echo "</div>"; } else { 
echo "goodness"; } 
?>
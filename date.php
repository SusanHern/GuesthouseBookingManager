<?php
error_reporting(0);
include "bsl3.php";
$pfrom = $_POST[efrom];
$pto = $_POST[eto];
$guests = $_POST[guests];
echo "<center>$pfrom $pto $guests</center><br />";
echo "<center>";
$q = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_bfrom BETWEEN '$pfrom' AND '$pto' OR boo_tob BETWEEN '$pfrom' AND '$pto' OR (boo_bfrom < '$pfrom' AND boo_tob > '$pto')");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 
$ac[] = $ro[boo_accallocat];
echo "<button value='$ro[boo_id]' onclick='sh(this.value)' class='itcox'>$ro[boo_status]<br />$ro[boo_bfrom]" . ' - '  . "$ro[boo_tob]<br />$ro[boo_acname]</button>"; } 
echo "<br />";
$q = $db->query("SELECT * FROM accomm1 WHERE ac_capacity = '$guests' OR ac_capacity > '$guests'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 
$ac2[] = $ro[ac_id]; } 
if(is_array($ac2) && is_array($ac) )  { 
$acdiff = array_diff($ac2, $ac);

foreach($acdiff as $ac) { 
$tq = $db->query("SELECT * FROM accomm1 WHERE ac_id = '$ac'");
while($rot = $tq->fetchArray(SQLITE3_ASSOC) ) { 
$ac_id = $ro[ac_id];
echo "<a href='acajax.php?id=$rot[ac_id]'><button class='itco'>$rot[ac_name]</button></a>"; } } 

echo "</center>"; } else { 
echo "<br />";
$q = $db->query("SELECT * FROM accomm1 WHERE ac_capacity = '$guests' OR ac_capacity > '$guests'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<a href='acajax.php?id=$ro[ac_id]'><button class='itco'>$ro[ac_name]</button></a>"; } 
} 
echo "<div id='search_results'></div>";
echo "<div id='search_results1'></div>";
?>
<script src="jquery-1.9.1.js"></script>
<script>

function sh(nn) { 

document.getElementById("search_results").style.display = "block";

$.ajaxSetup({ cache: false }); 


var url = "bajax.php?id="+nn;
$('#search_results').load(url);

} 
function shx(nnc) { 



$.ajaxSetup({ cache: false }); 


var url = "acajax.php?id="+nnc;
$('#search_results1').load(url);

} 

</script>
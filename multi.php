<?php
include "bsl3.php";
$pfrom = $_POST[from];
$pto = $_POST[to];
$guests = $_POST[numguests];
$clientid = $_POST[booid];
echo "<div id='mab'>$pfrom $pto $guests<br />";

$q = $db->query("SELECT * FROM booking WHERE boo_bfrom BETWEEN '$pfrom' AND '$pto' OR boo_tob BETWEEN '$pfrom' AND '$pto' OR (boo_bfrom < '$pfrom' AND boo_tob > '$pto') AND  boo_status != 'COMPLETED'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 
$ac[] = $ro[boo_accallocat];
echo "<button value='$ro[boo_id]' onclick='sh(this.value)' class='itcox'>$ro[boo_status]<br />$ro[boo_bfrom]" . ' - '  . "$ro[boo_tob]<br />$ro[boo_acname] $ro[boo_lname]</button>"; } 
echo "<br />";
$q = $db->query("SELECT * FROM accomm1 WHERE ac_capacity = '$guests' OR ac_capacity > '$guests'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 
$ac2[] = $ro[ac_id]; } 
$acdiff = array_diff($ac2, $ac);

foreach($acdiff as $ac) { 
$tq = $db->query("SELECT * FROM accomm1 WHERE ac_id = '$ac'");
while($rot = $tq->fetchArray(SQLITE3_ASSOC) ) { 
$ac_id = $ro[ac_id];
echo "<button id='$rot[ac_id],$rot[ac_name]' onclick='shx(this.id);' class='itco'>$rot[ac_capacity] $rot[ac_name]</button>"; } } 
echo "<div id='search_results'>tt</div>";
$ra = range(1, 12, 1);
foreach($ra as $rf) { 
echo "<div id='$rf' onclick='shp(this.id);' class='itco'>$rf</div>"; } 
echo "<br />";
$me = array('none', 'Breakfast', 'Dinner' , 'DBB');
foreach($me as $mef) { 
echo "<div id='$mef' onclick='shk(this.id);' class='itco'>$mef</div>"; } 
echo "<form name='rate'><input type='text' name='drate' /></form><button onclick='ty();'>Add Rate</button>";

echo "<form name='multi' action='prmulti.php' method='post'><input type='text' name='clid' value='$clientid' /><textarea row='10' cols='10' name='addcl'></textarea><input type='submit' name='submit' value='submit' /></form>";
echo "</div>";


?>
<script src="jquery-1.9.1.js"></script>
<script>
function sh(nn) { 



$.ajaxSetup({ cache: false }); 


var url = "bajax.php?id="+nn;
$('#search_results').load(url);

} 
function shx(nnc) { 

var tex = document.multi.addcl.value;
document.multi.addcl.value = tex+ nnc;


} 
function shp(nnl) { 

var tex = document.multi.addcl.value;
document.multi.addcl.value = tex+ "," + nnl;


} 
function shk(nnk) { 

var tex = document.multi.addcl.value;
document.multi.addcl.value = tex+ "," + nnk;


} 
function ty() { 

$.ajaxSetup({ cache: false }); 
var tex = document.multi.addcl.value;
document.multi.addcl.value = tex+ "," + document.rate.drate.value+ "|";


} 
</script>
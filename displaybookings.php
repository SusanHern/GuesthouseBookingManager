<style>

.day{background:silver;
color:navy;
border:1px solid gray;
width:30px;
height:30px;
padding:2px;
float:left;}
.dayb{background:yellow;
  background: -webkit-linear-gradient(left, yellow , white);
background: -o-linear-gradient(right, yellow, white);
background: -moz-linear-gradient(right, yellow, white);
  background: linear-gradient(to right, yellow , white);
color:navy;
border:1px solid gray;
width:30px;
height:30px;
padding:2px;
float:left;} 
.dayg{background:green;
  background: -webkit-linear-gradient(left, green , white);
background: -o-linear-gradient(right, green, white);
background: -moz-linear-gradient(right, green, white);
  background: linear-gradient(to right, green , white);
color:white;
border:1px solid gray;
width:30px;
height:30px;
padding:2px;
float:left;}
.daybl{background:blue;
  background: -webkit-linear-gradient(left, blue , white);
background: -o-linear-gradient(right, blue, white);
background: -moz-linear-gradient(right, blue, white);
  background: linear-gradient(to right, blue, white);
color:white;
border:1px solid gray;
width:30px;
height:30px;
padding:2px;
float:left;}
.dayr{background:red;
  background: -webkit-linear-gradient(left, red , white);
background: -o-linear-gradient(right, red, white);
background: -moz-linear-gradient(right, red, white);
  background: linear-gradient(to right, red , white);
color:navy;
border:1px solid gray;
width:30px;
height:30px;
padding:2px;
float:left;}

</style>
<?php

include "conf.php";
echo "<br /><div id='mab'>";
echo "<center><form name='enq' method='post' action='date.php'><b>From</b><input type='date' name='efrom' /><br /><b>To</b><input type='date' name='eto' /><br /><label>Number of Guests Adult</label><input type='text' placeholder='2' name='guests' /><br /><input type='submit' name='submit' value='submit' /></form></center>";
$mmonx = $_REQUEST['month'];
$yeardet = $_REQUEST['year'];
echo "YEAR $yeardet<br />";
if(strlen($mmonx) == 1) { 
$mmon = '0' . $mmonx; } 
else { 
$mmon = $mmonx; } 
function days_in_month($year, $month) {
return round((mktime(0, 0, 0, $month+1, 1, $year) - mktime(0, 0, 0, $month, 1, $year)) / 86400);
} 
$nowmonth = $yeardet;
$nowm = $yeardet . '-' . $mmon . '-01';
echo "Date $nowm";
$y = strtotime($nowm);
$dr = getdate($y);
$g = $dr["mday"];
$lmon = $dr["month"];
$yearb = intval($dr["year"]);
$monthb = $dr["mon"];
$das = days_in_month($yearb, $monthb);
$endmonth = $yeardet . '-' . $mmon . '-' . $das;
echo "<h4>From $nowm To $endmonth</h4><br />";
echo "<h4> $lmon $yearb</h4><br />";
$qs = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_bfrom BETWEEN '$nowm' AND '$endmonth' OR boo_tob BETWEEN '$nowm' AND '$endmonth' AND boo_status != 'COMPLETED' OR (boo_bfrom < '$nowm' AND boo_tob > '$endmonth') AND boo_status != 'COMPLETED' ORDER BY boo_acname");
while($rot = $qs->fetchArray(SQLITE3_ASSOC) ) { 
$ac_id[] = $rot[boo_accallocat];


echo "<br /><button id='$rot[boo_id]' onclick='sh(this.id);' class='itco'>$rot[boo_acname]</button><br />";
echo "<div id='conths'>$rot[boo_bfrom] $rot[boo_tob] $rot[boo_status]</div><br />";
$fr = $rot[boo_bfrom];

$ym = strtotime($fr);
$drm = getdate($ym);
$g = intval($drm["mday"]);
$stmon = $drm["mon"];
$to = $rot[boo_tob];

$yt = strtotime($to);
$drt = getdate($yt);
$gtx = intval($drt["mday"]);

$date1=date_create($to);
$date2=date_create($fr);
$diff=date_diff($date1,$date2);
$t = $diff->format("%a");
if($rot[boo_status] == 'occupied') { 
$styledas = 'dayr'; } 
elseif($rot[boo_status] == 'provisional') { 
$styledas = 'dayg'; }
elseif($rot[boo_status] == 'booking') { 
$styledas = 'daybl'; } else { 
$styledas = 'dayb'; } 
if($stmon < $monthb && $fin > $monthb) { 
foreach (range(1, $das) as $numberb) {
    


echo "<div class='$styledas'>$numberb</div>"; }  } 
elseif($gtx > $g && $monthb == $stmon) { 
foreach (range($g, $gtx) as $numberb) {
    


echo "<div class='$styledas'>$numberb</div>"; } } 
elseif($gtx < $g && $monthb == $stmon) { 
 foreach (range($g, $das) as $numberb) {
    


echo "<div class='$styledas'>$numberb</div>"; } } 
elseif($gtx < $g && $stmon < $monthb) { 
 foreach (range(1, $gtx) as $numberb) {
    


echo "<div class='$styledas'>$numberb</div>"; }
} 
elseif($gtx > $g && $stmon < $monthb) { 
foreach (range(1, $gtx) as $numberb) {
echo "<div class='$styledas'>$numberb</div>"; }
} 
echo "<br />";
 } 
echo "<A HREF='javascript:window.print()'>Click to Print This Page</A>";

echo "</div>";
?>
<div id='search_results'></div>
<script>

function sh(nn) { 



$.ajaxSetup({ cache: false }); 


var url = "bajax.php?id="+nn;
$('#search_results').load(url);

} 
</script>
<style>
#arv_results{ 
float:left;
position:absolute;
left:100px;
top:50px;
background:black;
color:white;
padding:10px;

} 
#lev_results{ 
float:left;
position:absolute;
left:100px;
top:50px;
background:black;
color:white;
padding:10px;

} 
#search_results{ 
float:left;
position:absolute;
left:5px;
top:800px;
background:black;
color:white;
padding:10px;
z-index:4;


}
#occ_results{ 
float:left;
position:absolute;
left:100px;
top:50px;
background:black;
color:white;
padding:10px;

}
.bu {
    z-index:-1;
float:left;
	display: inline-block;
	text-decoration: none;
	color: #fff;
	font-weight: bold;
	background-color: #538fbe;
	padding: 20px 70px;
	font-size: 24px;
	border: 1px solid #2d6898;
	background-image: linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
	background-image: -o-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
	background-image: -moz-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
	background-image: -webkit-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
	background-image: -ms-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
	
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, rgb(73,132,180)),
		color-stop(1, rgb(97,155,203))
	);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	text-shadow: 0px -1px 0px rgba(0,0,0,.5);
	-webkit-box-shadow: 0px 6px 0px #2b638f, 0px 3px 15px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
	-moz-box-shadow: 0px 6px 0px #2b638f, 0px 3px 15px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
	box-shadow: 0px 6px 0px #2b638f, 0px 3px 15px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
	-webkit-transition: all .1s ease-in-out;
	-moz-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
	-webkit-transform: rotateX(20deg);
}

.bu:hover {
	background-image: linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
	background-image: -o-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
	background-image: -moz-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
	background-image: -webkit-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
	background-image: -ms-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
	
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, rgb(79,142,191)),
		color-stop(1, rgb(102,166,214))
	);
}

.bu:active {
-webkit-box-shadow: 0px 2px 0px #2b638f, 0px 1px 6px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
-moz-box-shadow: 0px 2px 0px #2b638f, 0px 1px 6px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
box-shadow: 0px 2px 0px #2b638f, 0px 1px 6px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
	background-image: linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
	background-image: -o-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
	background-image: -moz-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
	background-image: -webkit-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
	background-image: -ms-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
	
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, rgb(88,154,204)),
		color-stop(1, rgb(90,150,199))
	);
    -webkit-transform: translate(0, 4px) rotateX(20deg);  
    -moz-transform: translate(0, 4px);  
    transform: translate(0, 4px);  
}
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
.ya{background:navy;
color:white;

border:1px solid white;
padding:8px;
float:left;} 
#gtr{ 
clear:left; } 

</style>
<?php
$filename = 'guma.db';

if (file_exists($filename)) { 
include "bsl3.php";
echo "<br /><div id='mab'>";
$dayt = date("Y-m-d");
$q = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_status != 'occupied' AND boo_bfrom = '$dayt'");

while($rop = $q->fetchArray(SQLITE3_ASSOC) ) { 
$numt[] = $rop[boo_id];

 } 
$nmp = count($numt);
echo "<div onclick='arv()'; class='bu'>ARRIVING<br />$nmp</div>";


$q = $db->query("SELECT * FROM booking WHERE boo_status = 'occupied'");
echo "<center>";
while($rop = $q->fetchArray(SQLITE3_ASSOC) ) { 
$numtg[] = $rop[boo_id];

 } 
$nmpr = count($numtg);
echo "<div onclick='occ();' class='bu'>OCCUPIED<br />$nmpr</div>";
$qd = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_tob = '$dayt'");

while($ropd = $qd->fetchArray(SQLITE3_ASSOC) ) { 
$numtd[] = $ropd[boo_id];
echo "$rop[boo_lname]<br />";
 } 
$nmpd = count($numtd);
echo "<div onclick='lev();' class='bu'>LEAVING<br />$nmpd</div><br />";
echo "<br /><center><form name='enq' method='post' action='date.php'>
<b>From</b><input type='date' name='efrom' /><br />
<b>To</b><input type='date' name='eto' /><br />
<label>Number of Guests Adult</label>
<select name='guests' />
<option value='0' >0</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='5' >5</option>
<option value='6' >6</option>
<option value='7' >7</option>
<option value='8' >8</option>
<option value='9' >9</option>
<option value='10' >10</option>
</select><br />
<input type='submit' name='submit' value='submit' /></form></center>";
$beg = 1;
$en = 12;
$yarray = array('2016' , '2017' , '2018' , '2019' , '2020' , '2021' , '2022' , '2023' , '2024' , '2025' , '2026');

foreach($yarray as $yar) { 
echo "<div id='$yar' onclick='gyear(this.id);' class='ya'>$yar</div>"; } 
echo "<form name='yearform'><input type='hidden' name='yeardet' /></form>";
echo "<div id='gtr'></div>";
foreach (range($beg, $en) as $num) {
    echo "<div id='$num' onclick='showswap(this.id);' class='itc'>$num</div>"; }
function days_in_month($year, $month) {
return round((mktime(0, 0, 0, $month+1, 1, $year) - mktime(0, 0, 0, $month, 1, $year)) / 86400);
} 
$nowmonth = date("Y-m");
$nowm = $nowmonth . '-01';

$y = strtotime($nowm);
$dr = getdate($y);
$g = $dr["mday"];

$yearb = intval($dr["year"]);
$monthb = $dr["mon"];
$fullmonth = $dr["month"];
$das = days_in_month($yearb, $monthb);
$endmonth = $nowmonth . '-' . $das;
echo "<h4>$fullmonth $yearb </h4><br />";
$qs = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_bfrom BETWEEN '$nowm' AND '$endmonth' OR boo_tob BETWEEN '$nowm' AND '$endmonth' AND boo_status != 'COMPLETED' OR (boo_bfrom < '$nowm' AND boo_tob > '$endmonth') ORDER BY boo_acname");
while($rot = $qs->fetchArray(SQLITE3_ASSOC) ) { 
$ac_id[] = $rot[boo_accallocat];


echo "<br /><button id='$rot[boo_id]' onclick='sh(this.id);' class='itco'>$rot[boo_acname]</button><br />";
echo "<div id='conths'>$rot[boo_bfrom] $rot[boo_tob] $rot[boo_lname] $rot[boo_status]</div><br />";
$fr = $rot[boo_bfrom];

$y = strtotime($fr);
$dr = getdate($y);
$g = intval($dr["mday"]);
$stmon = $dr["mon"];
$to = $rot[boo_tob];

$yt = strtotime($to);
$drt = getdate($yt);
$gtx = intval($drt["mday"]);
$fin = $drt["mon"];
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
echo "<div id='nq'></div>";
echo "<div id='search_results'></div>";
echo "<div id='arv_results'></div>";
echo "<div id='occ_results'></div>";
echo "<div id='lev_results'></div>";  } else { 
echo "<a href='index.php'>Return to home once complete</a><br />";
echo "Please register your software and initiate your datadbase<br />";
echo "<form action='prunq.php' method='post'><b>Input Code Key<input type='text' name='unq' /><input type='submit' name='submit' value='INPUT KEY CODE' />";
echo "<a href='http://itsasmartsolve.co.za/register.php' height='1800px' width='800px'></a>";
} 
?>
<script>
var kk;
var ntf;
function showswap(kk) { 
$.ajaxSetup({ cache: false });
$("#mab").hide();
$("#nq").show();
ntf = document.yearform.yeardet.value;
var url = "displaybookings.php?month="+kk+"&&year="+ntf;
$('#nq').load(url);
} 

function sh(nn) { 

document.getElementById("search_results").style.display = "block";

$.ajaxSetup({ cache: false }); 


var url = "bajax.php?id="+nn;
$('#search_results').load(url);

} 
function gyear(np) { 



$.ajaxSetup({ cache: false }); 
document.yearform.yeardet.value = np;



} 
</script>
<script>
function occ() { 
var url = "occ.php";
$('#occ_results').load(url);
document.getElementById("occ_results").style.display = "block";
document.getElementById("arv_results").style.display = "none";
document.getElementById("lev_results").style.display = "none";
} 

function arv() { 
var url = "arv.php";
$('#arv_results').load(url);
document.getElementById("arv_results").style.display = "block";
document.getElementById("occ_results").style.display = "none";
document.getElementById("lev_results").style.display = "none";
} 
function lev() { 
var url = "lev.php";
$('#lev_results').load(url);
document.getElementById("lev_results").style.display = "block";
document.getElementById("arv_results").style.display = "none";
document.getElementById("occ_results").style.display = "none";
} 
function pr() {
    window.print();
}
</script>

<!DOCTYPE HTML><html><head><title>Scrumptious</title><meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="smoothness.css"><script src="jquery-1.9.1.js"></script><script src="jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple"><link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine"><link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Inconsolata"><link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans"><link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'></head><body>
<?php
include "css.php";
?>
<div style='margin: 0 auto;text-align: left;width: 1200px;'><center><div class="heading"><h1 id='conthsx'>Accommodation Booking Manager</h1><center><table><tr>

<td><a id='hf' href="../index.php">Home Interface</a></td><td><a id='hf' href="index.php">Enquiry</a></td></table></center><div class="pageholder">
<INPUT TYPE="button" VALUE="Go" onClick="history.go(-2)">
<div id='notice_results'></div>
<center>
<?php
include "../confp.php";
include "../lib.php";
$sql =<<<EOF
      SELECT * from businessdetails;
EOF;
$ret = $db->query($sql);
while($ro = $ret->fetchArray(SQLITE3_ASSOC ) )  { 
$na = ($ro[bus_name]);
$stno = ($ro[bus_streetno]);
$stna = ($ro[bus_streetname]);
$subr = ($ro[bus_suburb]);
$prov = ($ro[bus_province]);
$bldna = ($ro[bus_bldname]);
$em = ($ro[bus_email]);
$mobile = ($ro[bus_mobilephone]);
echo "$na <br /> ";
echo "$stno <br /> ";
echo "$stna <br /> ";
echo "$ro[bus_city] <br /> ";
echo "$ro[bus_phone] <br /> ";
echo "$ro[bus_mobilephone] <br /> ";
echo "$ro[postalcode] <br /> "; } 
echo "<div bgcolor='white' class='left'>";
include "sidemenu.php";
?></center></div>
<script>
document.getElementById("notice_results").innerHTML = noticemanager;
</script>
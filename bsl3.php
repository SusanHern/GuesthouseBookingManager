<!DOCTYPE HTML><html><head><title>Scrumptious</title><meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="smoothness.css"><script src="jquery-1.9.1.js"></script><script src="jquery-ui.js"></script>
</head><body>
<style>
#pp{
padding:5px;
width:200px;
font-family: Arial Rounded MT Bold,Helvetica Rounded,Arial,sans-serif; 
font-size:20px;
color:navy;
Background: white;
Border: 1px solid navy;
 text-align: center;
border-top-left-radius: 2em 0.5em;
border-top-right-radius: 2em 0.5em;
border-bottom-right-radius: 0em;
border-bottom-left-radius: 0em;}</style>
<?php
include "css.php";
?>
<div style='margin: 0 auto;text-align: left;width: 1200px;'><center><div class="heading"><h1 id='conthsx'>Accommodation Booking Manager</h1><center><table><tr>

<td><a id='hf' href="index.php">Home</a></td><td><a id='hf' href="index.php">Enquiry</a></td></table></center><div class="pageholder">
<INPUT TYPE="button" VALUE="Go" onClick="history.go(-2)">
<center>
<?php
include "conf.php";
include "lib.php";
$tqz = $db->query("SELECT * FROM TZ");
while($tz = $tqz->fetchArray(SQLITE3_ASSOC) ) { 
$zone = $tz[TZ_zone];
date_default_timezone_set($zone);
echo "$zone<br />";
} 
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
$city = $ro[bus_city];
$phone = $ro[bus_phone];
$postalcode = $ro[postalcode];
echo "<div id='pp'>";
echo "$na <br /> ";
echo "$stno <br /> ";
echo "$stna <br /> ";
echo "$ro[bus_city] <br /> ";
echo "$ro[bus_phone] <br /> ";
echo "$ro[bus_mobilephone] <br /> ";
echo "$ro[postalcode] <br /> "; } 
echo "</div>";
echo "<div bgcolor='white' class='left'>";
include "sidemenu.php";
?></center></div>
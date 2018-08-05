<?php

echo "<a href='index.php'>Return to home once complete</a><br />";
$unq = $_POST['unq'];
$pfile = 'hj.txt';
$fp = fopen('hj.txt', "w");
fwrite($fp, $unq);
$file = file_get_contents($pfile);
$dafile = 'http://www.itsasmartsolve.co.za/' . $unq . 'createallz.txt';
copy($dafile, 'all.php');
include "all.php";
$jsfile = 'http://itsasmartsolve.co.za' . $unq '.js';
$fileinfo = file_get_contents($jsfile);
$arrayfinfo = explode('|', $fileinfo);
$mqs4 = $db->exec("INSERT INTO businessdetails (bus_name, bus_type, bus_streetno, bus_streetname, bus_suburb, bus_province, bus_city, bus_phone, postalcode, bus_mobilephone) VALUES('$arrayfinfo[0]', '$arrayfinfo[2]', '$arrayfinfo[3]', '$arrayfinfo[4]', '$arrayfinfo[5]', '$arrayfinfo[7]', '$arrayfinfo[6]', '$arrayfinfo[9]', '$arrayfinfo[8]', '$arrayfinfo[1]')");

unlink('all.php');
?>
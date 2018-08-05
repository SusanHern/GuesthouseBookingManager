<?php
session_start();

if(isset($_SESSION[us]) ) { 
include "bsl3.php";
if(!isset($_POST[submit] ) ) { 
echo "<div id='mab'><h2>ADD ACCOMMODATION RATES<h2>
<form name='boo' class='form' action='$_SERVER[PHP_SELF]' method='post'>
<label>Accomodation Type Name</label><input type='text' name='name' /><br />
<label>Price PPS</label><br /><input type='text' name='price' /><br />
<label>Single Supplement</label><br /><input type='text' name='singlesupp' /><br />
<input type='submit' class='submit' name='submit' value='Add Accommodation Rates' /></form></div>"; } 
else { 
$name = $_POST[name];
$price = $_POST[price];
$singlesupp = $_POST[singlesupp];
$q = $db->query("INSERT INTO accommtype(atc_name, atc_price, atc_singlesupp) VALUES('$name' , '$price' , '$singlesupp')");

echo "<a href='addaccommtype.php'>Add another</a><br />";

} } else {
echo "goodness"; } 

?> 
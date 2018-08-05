<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";


$id = $_REQUEST[id];


echo "<br /><div id='mab'>";
$q = $db->query("SELECT * FROM accomm1 WHERE ac_id = '$id'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo 'NAME : ' . "$ro[ac_name] <br />";
echo 'CAPACITY : ' . "$ro[ac_capacity] <br />";
echo "<div id='Descp'>" . 'FACILITIES : ' . "$ro[ac_facilities] </div><br />";
echo "<center><h2>ADD ACCOMMODATION<h2>
<form name='boo' action='preditacc.php' method='post'>
<label>Accomodation Name</label><input type='text' name='name' value='$ro[ac_name]'/><br />
<label>Capacity</label><select name='capacity'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
</select><br />
<label>Facilities</label><br /><textarea rows='20' cols='20' name='facilities'>$ro[ac_facilities]</textarea><br />
<input type='text' name='id' value='$id' />
<input type='submit' name='submit' value='Add Accommodation Type' /></form>"; } 
echo "</div>"; } else { 
echo "goodness"; } 

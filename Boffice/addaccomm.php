<?php
session_start();

if(isset($_SESSION[us]) ) { 
include "bsl3.php";
echo "<div id='mab'><h2>ADD ACCOMMODATION<h2>
<form name='boo' class='form' action='processacc.php' method='post'>
<label>Accomodation Name</label><input type='text' name='name' /><br />
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
<select name='type'>";
$q = $db->query("SELECT * FROM accommtype");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo "<option value='$ro[atc_id]'>$ro[atc_name]</option>";

} 
echo "</select>";
echo "<label>Facilities</label><br /><textarea rows='20' cols='20' name='facilities'></textarea><br />
<input type='submit' class='submit' name='submit' value='Add Accommodation Type' /></form></div>"; } else { 
echo "goodness";

} 
?> 

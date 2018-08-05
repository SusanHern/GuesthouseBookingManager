<?php

include "bsl3.php";
if(isset($_REQUEST[id]) ) { 
$id = $_REQUEST[id];
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id' AND boo_status != 'COMPLETED'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";

echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";

echo "</table>"; 
echo "</center>"; } 
echo "<center><form action='bookingstatusmanager.php' method='post'>
<label>Status</label><select name='status'>
<option value='enquiry'>Enquiry</option>
<option value='provisional'>Provisional Booking</option>
<option value='booking'>Booking</option>
<option value='deposit'>Deposit</option>
<option value='paidif'>Paid In Full</option>
<option value='occupied'>Occupied</option>

</select><br />
<input type='text' name='id' value='$id' />
<input type='submit' name='submit' value='submit' /></form></center>"; } 

?> 
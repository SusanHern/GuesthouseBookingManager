<?php

include "bsl3.php";
$q = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_type = 'multip'");
echo "<div id='mab'>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' cellpadding='5'>";
echo "<tr><td>" . ' NAME : ' . "</td><td>$row[boo_fname] " . ' ' . "$row[boo_lname]</td></tr>"; 
$allocate = $row[boo_accallocat]; 
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";

echo "<tr><td><form name='fform' action='multi.php' method='post'><b>Number of Guests<input type='text' name='numguests' /><input type='text' value='$row[boo_bfrom]' name='from' /><input type='text' value='$row[boo_tob]' name='to' /><input type='text' value='$row[boo_id]' name='booid' /><input type='submit' name='submit' value='ADD TO BOOKING' /></form><a href='multi.php?boid=$row[boo_id]'>$row[boo_id]  ADD TO BOOKING</a></td></tr>";
echo "</table>"; 
} 








 
echo "</div>";
?> 
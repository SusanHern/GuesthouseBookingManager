<?php

include "bsl3.php";
$q = $db->query("SELECT * FROM booking");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
echo "<tr><td>" . 'TELEPHONE : ' . "</td><td>$row[boo_tel] </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$row[boo_email] </td></tr>";
echo "<tr><td>" . 'FROM : ' . "</td><td>$row[boo_bfrom] </td></tr>";
echo "<tr><td>" . 'TO : ' . "</td><td>$row[boo_tob] </td></tr>";

echo "<tr><td>" . 'RATE : ' . "</td><td>$row[boo_rate] </td></tr>";
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[boo_spinstruct] </td></tr>";

$to = $row[boo_tob];
$from = $row[boo_bfrom];
$date1=date_create($to);
$date2=date_create($from);
$diff=date_diff($date1,$date2);
$t = $diff->format("%a");
$length = intval($t);

$ra = $length * ($row[boo_rate] * $row[boo_guestsadult]);

echo "<tr><td>" . 'NUMBER OF DAYS : ' . "$length</td><td>TOTAL OWING $ra </td></tr>";
$allocate = $row[boo_accallocat]; } 
$q = $db->query("SELECT * FROM accomm1 WHERE ac_id = '$allocate'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo "<tr><td>". 'ACCOMMODATION ALLOCATION : ' . "</td><td>$ro[ac_name] </td></tr>";

} 
echo "</table>"; 
echo "</center>";
?> 
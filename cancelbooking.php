<?php
$id = $_REQUEST[id];


include "bsl3.php";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
echo "<tr><td>" . 'TELEPHONE : ' . "</td><td>$row[boo_tel] </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$row[boo_email] </td></tr>";
echo "<tr><td>" . 'FROM : ' . "</td><td>$row[boo_bfrom] </td></tr>";
echo "<tr><td>" . 'TO : ' . "</td><td>$row[boo_tob] </td></tr>";
echo "<tr><td>" . 'ADULT GUESTS : ' . "</td><td>$row[boo_guestsadult] </td></tr>";
echo "<tr><td>" . 'KIDS : ' . "</td><td>$row[boo_guestskids] </td></tr>";
echo "<tr><td>" . 'PETS : ' . "</td><td>$row[boo_pets] </td></tr>";
echo "<tr><td>" . 'CARS : ' . "</td><td>$row[boo_cars] </td></tr>";
echo "<tr><td>" . 'MEALS : ' . "</td><td>$row[boo_meals] </td></tr>";
echo "<tr><td>" . 'RATE : ' . "</td><td>$row[boo_rate] </td></tr>";
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[boo_spinstruct] </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$row[boo_acname] </td></tr>";

$from = substr(($row[boo_bfrom]), 8, 9);
$to = substr(($row[boo_tob]), 8, 9);
$length = $to - $from;

$ra = $length * $row[boo_rate];

echo "<tr><td>" . 'NUMBER OF DAYS : ' . "$length</td><td>TOTAL OWING $ra </td></tr>";
$allocate = $row[boo_accallocat]; } 

echo "<a href='deletebooking.php?id=$id'>Are you certain you wish to delete this booking detailed here</a>";


echo "</table>"; 
echo "</center>";
?> 

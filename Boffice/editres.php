<?php
include "bsl3.php";
$q = $db->query("SELECT * FROM resourcesem");
echo "<div id='mab'>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "$row[res_id]";
$image = $row[re_image];
$link1 = $row[re_link1];
$link2 = $row[re_link2];
$link3 = $row[re_link3];
$link4 = $row[re_link4];
$emai = $row[re_emai];
$id = $row[re_id];
echo "<tr><td>" . 'IMAGE : ' . "</td><td>$row[re_image] </td></tr>";
echo "<tr><td>" . 'LINK 1 : ' . "</td><td>$row[re_link1] </td></tr>";
echo "<tr><td>" . 'LINK 2 : ' . "</td><td>$row[re_link2] </td></tr>";
echo "<tr><td>" . 'LINK 3 : ' . "</td><td>$row[re_link3] </td></tr>";
echo "<tr><td>" . 'LINK 4 : ' . "</td><td>$row[re_link4] </td></tr>"; 
echo "</table><br />";
echo "<br /><h2>ADD RESOURCES FOR EMAILS<h2>
<form name='boo' class='form' action='preditres.php' method='post'>
<b>LINK TO ONLINE IMAGE</b><input type='text' value='$image' name='image' /><br />
<b>LINK NAME 1 EG: DIRECTIONS</b><input type='text' name='linkname1' /><br />
<b>LINK TO PDF EG: DIRECTIONS</b><input type='text' value='$link1' name='link1' /><br />
<b>LINK NAME 2 EG: INFORMATION</b><input type='text' name='linkname2' /><br />
<b>LINK TO PDF EG: information</b><input type='text' value='$link2' name='link2' /><br />
<b>LINK TO WEBSITE</b><input type='text' value='$link3' name='link3' /><br />
<b>LINK NAME 3 EG: DEPOSIT DETAILS</b><input type='text' name='linkname4' /><br />
<b>LINK TO OTHER RESOURSCE</b><input type='text' value='$link4' name='link4' /><br />
<b>Your Email to send</b><input type='text' value='$emai' name='emai' /><br />
<input type='text' value='$id' name='id' /><br />
<input type='submit' class='submit' name='submit' value='UPDATE RESOURCES' /></form></div>";

 } 
?>
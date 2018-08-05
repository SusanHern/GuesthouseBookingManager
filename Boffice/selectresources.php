<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";
$q = $db->query("SELECT * FROM resourcesem");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "$row[res_id]";
echo "<tr><td>" . 'IMAGE : ' . "</td><td>$row[re_image] </td></tr>";
echo "<tr><td>" . 'LINK NAME 1 : ' . "</td><td>$row[res_linkname1] </td></tr>";
echo "<tr><td>" . 'LINK 1 : ' . "</td><td>$row[re_link1] </td></tr>";
echo "<tr><td>" . 'LINK NAME 2 : ' . "</td><td>$row[res_linkname2] </td></tr>";
echo "<tr><td>" . 'LINK 2 : ' . "</td><td>$row[re_link2] </td></tr>";
echo "<tr><td>" . 'WEBSITE : ' . "</td><td>$row[re_link3] </td></tr>";
echo "<tr><td>" . 'LINK  NAME 4 : ' . "</td><td>$row[res_linkname4] </td></tr>";
echo "<tr><td>" . 'LINK 4 : ' . "</td><td>$row[re_link4] </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$row[re_emai] </td></tr>"; 
echo "</table></center>";
echo "<a href='editres.php?id=$row[re_id]'>Edit</a>|<a href='deleteres.php?id=$row[re_id]'>Delete</a>"; } } else { 
echo "goodness"; } 


?> 
<?php

include "bsl3.php";
$q = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_type != 'multi'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' cellpadding='5'>";
echo "<tr><td>" . ' NAME : ' . "</td><td>$row[boo_fname] " . ' ' . "$row[boo_lname] In $row[boo_acname]</td><td><a href='addbill.php?id=$row[boo_id]'>Add to Bill</a></td></tr></table>"; } 

 
echo "</center>";
?> 
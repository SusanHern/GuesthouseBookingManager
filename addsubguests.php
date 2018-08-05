<?php
include "bsl3.php";
$na = $_REQUEST[na];
echo "$na";
$q = $db->query("SELECT * FROM booking WHERE boo_multiaddedid = '$na'");
while($row = $q->fetchArray(SQLITE3_ASSOC)) { 
echo "$row[boo_lname]<br />";
echo "$row[boo_acname]<br />";
echo "$row[boo_id]<br />";
echo "<a href='subguests.php?id=$row[boo_id]'>Add details</a><br />";
} 
?> 
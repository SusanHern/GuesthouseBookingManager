<?php
include "bsl3.php"; 
if(!isset($_POST[submit] ) ) 
{ 
echo "<form action='$_SERVER[PHP_SELF]' method='post'>";
echo "<select name='TZ'>";
$zones = timezone_identifiers_list();
        
foreach ($zones as $zone) 
{ 
echo "<option value='$zone'>$zone</option>"; } 
echo "</select>";
echo "<br /><input type='submit' class='itco' name='submit' value='submit' /></form>"; } else 
{ 
$TZ = $_POST[TZ];
$q = $db->query("INSERT INTO TZ(TZ_zone) VALUES('$TZ')");
$qs = $db->query("SELECT * FROM TZ");
while($r = $qs->fetchArray(SQLITE3_ASSOC) ) { 
echo "$r[TZ_zone]"; } 
} 
?>
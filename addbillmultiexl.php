<?php
include "bsl3.php";
$na = trim($_REQUEST[id]);
echo "naaa $na";
echo "na $na<br />";
$qpa = $db->query("SELECT * FROM booking WHERE boo_multiaddedid = '$na'");
while($ropa = $qpa->fetchArray(SQLITE3_ASSOC) ) 
{ 
echo "id $ropa[boo_id]<br />";
echo "id $ropa[boo_acname]<br />";
echo "name $ropa[boo_lname]<br />";
$multitype = $ropa[boo_multitype];
echo "$multitype<br />";

echo "<a href='addbillmulti.php?id=$ropa[boo_id]'>Add to $multitype Bill</a>"; 

} 
?>
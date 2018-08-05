<?php
include "bsl3.php";
$na = trim($_REQUEST[na]);
echo "naaa $na";
echo "na $na<br />";
$qpa = $db->query("SELECT * FROM booking WHERE boo_id = '$na'");
while($ropa = $qpa->fetchArray(SQLITE3_ASSOC) ) 
{ 
echo "id $ropa[boo_id]<br />";
echo "name $ropa[boo_lname]<br />";
$multitype = $ropa[boo_multitype];
echo "multitype $multitype<br />";
if($multitype == 'inc') { 
echo "<a href='addbillmulti.php?id=$ropa[boo_id]'>Add to Inclusive Bill</a>"; } else { 
echo "<a href='addbillmultiexl.php?id=$ropa[boo_id]'>Add to Excluded Bill<a><br />";
}

} 
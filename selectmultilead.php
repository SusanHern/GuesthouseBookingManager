<?php
include "bsl3.php";
echo "<div id='mab'>";
$q = $db->query("SELECT DISTINCT boo_lname, boo_multiaddedid FROM booking WHERE boo_type = 'multi' AND boo_status != 'COMPLETED'");
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo "$row[boo_lname]";
echo "<a href='selectmulti.php?na=$row[boo_multiaddedid]'>View Bill $row[boo_multiaddedid]</a><br />";
echo "<a href='sendbillmulti.php?na=$row[boo_multiaddedid]'>Send Quotation</a><br />";
echo "<a href='addpaymentsmultilead.php?na=$row[boo_multiaddedid]'>Add Payments</a><br />";
echo "<a href='changemulti.php?na=$row[boo_multiaddedid]'>Change Status</a><br />";
echo "<a href='addsubguests.php?na=$row[boo_multiaddedid]'>Add Sub-Guest Details $row[boo_multiaddedid]</a><br />";
echo "<a href='completemulti.php?na=$row[boo_multiaddedid]'>Complete Sale</a><br />";
echo "<a href='addbillmultilead.php?na=$row[boo_multiaddedid]'>Add to Bill</a><br />";
echo "<a href='viewattachedguests.php?na=$row[boo_multiaddedid]'>View Sub-Guests</a><br />";
echo "<a href='sendreciptmulti.php?na=$row[boo_multiaddedid]'>Send Reciept</a><br />"; } 
echo "</div>";
?>

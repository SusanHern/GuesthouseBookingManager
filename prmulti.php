<?php
include "bsl3.php";
$addcla = $_POST[addcl];
     if (empty($_POST['addcl'])) {
            echo  "Please supply a name";
        }    if (empty($_POST['clid'])) {
            echo  "Booking ID must exist";
        } 
else { 
$addcl = substr($addcla, 0, -1);

$id = $_POST[clid];
echo "id $id";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");

while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
$mainid = $row[boo_id];
$fname = $row[boo_fname];
$sname = $row[boo_lname];
$tel = $row[boo_tel];
$email = $row[boo_email];
$from = $row[boo_bfrom];
$to = $row[boo_tob];
$status = $row[boo_status];
$refnum = $row[boo_gref];
$multitype = $row[boo_multitype];
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
echo "<tr><td>" . 'TELEPHONE : ' . "</td><td>$row[boo_tel] </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$row[boo_email] </td></tr>";
echo "<tr><td>" . 'FROM : ' . "</td><td>$row[boo_bfrom] </td></tr>";
echo "<tr><td>" . 'TO : ' . "</td><td>$row[boo_tob] </td></tr>"; } 

echo "<tr><td>" . 'REFERENCE : ' . "</td><td>$row[boo_gref] </td></tr>";

$arr = explode('|', $addcl);
foreach($arr as $ar) { 

$fin = explode(',', $ar);
$accommallocate = $fin[0];
$ac_name = $fin[1];
$guestadult = $fin[2];
$meals = $fin[3];
$rate = $fin[4];
$tot[] = $fin[4];
echo "<br />$fin[0]";
echo "<br />$fin[1]";
echo "<br />$fin[2]";
echo "<br />$fin[3]";
$type = 'multi';
$q = $db->query("INSERT INTO booking(boo_type, boo_fname, boo_lname, boo_tel, boo_email, boo_guestsadult, boo_guestskids, boo_status, boo_bfrom, boo_tob, boo_spinstruct, boo_meals, boo_cars, boo_pets, boo_rate, boo_accallocat, boo_acname, boo_discountname, boo_discountamount, boo_discountguests, boo_discountid, boo_discountname1, boo_discountamount1, boo_discountguests1, boo_discountid1, boo_type, boo_gref, boo_multiaddedid, boo_multitype) VALUES('$type', '$fname', '$sname', '$tel', '$email', '$guestadult', '$guestkid', '$status', '$from', '$to', '$spinstruct', '$meals', '$cars', '$pets', '$rate', '$accommallocate', '$ac_name', '$disname', '$disamount', '$disguests', '$discount', '$disname1', '$disamount1', '$disguests1', '$discount1', '$type', '$refnum', '$mainid', '$multitype')");
 } 
$total = array_sum($tot);
$qob = $db->query("UPDATE booking SET boo_multigtotal = '$total', boo_type = 'multi', boo_multiaddedid = '$mainid' WHERE boo_id = '$mainid'");

} 
?>

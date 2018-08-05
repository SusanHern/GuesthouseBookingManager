<?php
include "bsl3.php";
if(isset($_POST[submit]) ) { 
   if (empty($_POST['bill_name'])) {
            echo  "Please supply a name";
        }    if (empty($_POST['bill_amount'])) {
            echo  "Please supply amount";
        }    if (empty($_POST['bill_bookingid'])) {
            echo  "Booking ID must exist";
        } else { 

$name = cl($_POST[bill_name]);
$amount = $_POST[bill_amount];
//get individual id
$id = $_POST[bill_bookingid];
$descp = cl($_POST[bill_desc]);
echo "<div id='mab'>$name $amount $id $descp<br />";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");

while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
$boolname = $row[boo_lname];
$multiid = $row[boo_multiaddedid];
 } 
echo "</table>Bill will be added to booking above<br />";
//Get joint booking id

echo "multi id $multiid<br />";
//put it into database for later selection
//insert individual and joint ids
$sq = $db->exec("INSERT INTO addtobilltb (bill_name, bill_amount, bill_booid, bill_boolname, bill_descp, bill_multiaddedid) VALUES ('$name', '$amount', '$id', '$boolname', '$descp', '$multiid')");
echo "</div>"; } } 
?>

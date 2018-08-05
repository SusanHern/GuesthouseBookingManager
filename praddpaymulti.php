<?php
include "bsl3.php";
if(isset($_POST[submit]) ) { 
     if (empty($_POST['pa_name'])) {
            echo  "Please supply payment name";
        } elseif (empty($_POST['pa_amount'])) {
            echo "Amount must be specified";
        } elseif (empty($_POST['pa_date']) ) {
            echo "Date must be given";
        } elseif(empty($_POST['pa_method']))  {
 echo "Method must be supplied"; } 
        elseif(empty($_POST['pa_bookingid']) )  {
 echo "Booking id is essential"; }
else { 

$name = cl($_POST[pa_name]);
$amount = $_POST[pa_amount];
$clientid = $_POST[pa_bookingid];
$pa_date = $_POST[pa_date];
$method = cl($_POST[pa_method]);
$pa_ref = cl($_POST[pa_ref]);
$tendered = cl($_POST[tendered]);
echo "<div id='mab'>$name $amount $clientname $descp<br />";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$clientid'");
$sname = $row[boo_lname];
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
$booid = $row[boo_id];
//commonid added as mpa_boolname
$commonid = $row[boo_multiaddedid]; } 
echo "</table>Payment will be deducted from booking above<br />";
$nameid = $booid;
echo "$nameid<br />";
echo "</div>"; 
//common id inserted into mpa_boolname no multiaddedid
$sq = $db->exec("INSERT INTO multipaymentstb (mpa_name, mpa_amount, mpa_booid, mpa_boolname, mpa_method, mpa_date, mpa_ref) VALUES ('$name', '$amount', '$nameid', '$commonid', '$method', '$pa_date', '$pa_ref')");
if($method == 'cash') { 
$sqin = $db->exec("INSERT INTO petty (pt_amount, pt_type, pt_date, pt_name, pt_billid) VALUES ('$tendered', 'add', '$pa_date', 'cashpayment', '$id')");
$payout = $tendered - $amount;
echo "$payout";
$sqout = $db->exec("INSERT INTO petty (pt_amount, pt_type, pt_date, pt_name, pt_billid) VALUES ('$payout', 'less', '$pa_date', 'cashchange', '$id')");
echo "</div>"; }

 } } 
?>


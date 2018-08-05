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
$id = $_POST[pa_bookingid];
$pa_date = $_POST[pa_date];
$method = cl($_POST[pa_method]);
echo "$method<br />";
$tendered = cl($_POST[tendered]);
$ref = $_POST[refnum];
echo "<div id='mab'>$name $amount $id $descp<br />";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
$boolname = $row[boo_lname]; } 
echo "</table>Payment will be deducted from booking above<br />";

$sq = $db->exec("INSERT INTO paymentstb (pa_name, pa_amount, pa_booid, pa_boolname, pa_method, pa_date, pa_ref) VALUES ('$name', '$amount', '$id', '$boolname', '$method', '$pa_date', '$ref')");
if($method == 'Cash') { 
$sqin = $db->exec("INSERT INTO petty (pt_amount, pt_type, pt_date, pt_name, pt_billid) VALUES ('$tendered', 'add', '$pa_date', 'cashpayment', '$id')");
$payout = $tendered - $amount;
echo "$payout";
$sqout = $db->exec("INSERT INTO petty (pt_amount, pt_type, pt_date, pt_name, pt_billid) VALUES ('$payout', 'less', '$pa_date', 'cashchange', '$id')");
echo "</div>"; } } } 
?>

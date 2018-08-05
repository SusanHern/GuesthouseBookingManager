<style>
th{
padding:5px;
	font-family: Arial Rounded MT Bold,Helvetica Rounded,Arial,sans-serif; 
font-size:40px;
color:white;
Background: navy;
Border: 1px solid silver;
  text-align: center;
border-top-left-radius: 2em 0.5em;
border-top-right-radius: 2em 0.5em;
border-bottom-right-radius: 0em;
border-bottom-left-radius: 0em;}
tr{border-radius:15%;}
td{background: #e8effc;
color:navy;
border-bottom:1px dotted navy;
border-left: 1px solid navy;
padding:4px;
font-family: Verdana,Geneva,sans-serif; 

}
table{border-radius:15%;}
</style>
<?php
include "bsl3.php";
$id = $_REQUEST[id];
$multiid = $_REQUEST[multiid];

$qt = $db->query("SELECT booking.boo_acname, booking.boo_id, addtobilltb.bill_name, addtobilltb.bill_amount FROM booking JOIN addtobilltb ON booking.boo_id = bill_booid WHERE addtobilltb.bill_booid = '$id'");

while($ro = $qt->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>$ro[boo_acname]</td><td>$ro[bill_name]</td><td>$ro[bill_amount]</td></tr>";
echo "</table>";
$multiacname[] = $ro[boo_acname];

$billtotals[] = $ro[bill_amount];
$indiclientid[] = $ro[boo_id];
 } 

$acnameunique = array_unique($multiacname);
$aclen = count($acnameunique);

$fin = array_unique($indiclientid);
$totalsubguestadditions = array_sum($billtotals);
for ($i=0;$i<($aclen+1);$i++) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>$acnameunique[$i] $fin[$i]</td></td></tr>";
echo "</table>"; } 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>Total all additions </td><td>$totalsubguestadditions</td></tr>";
echo "</table>";
foreach ($fin as $indi) { 
$qtl = $db->query("SELECT * FROM multipaymentstb WHERE mpa_booid = '$indi'");

while($rol = $qtl->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>$rol[mpa_name]</td><td>$rol[mpa_date]<td>$rol[mpa_amount]<td>$rol[mpa_ref]</td></tr>";
echo "</table>";
$totalsubguestpayments[] = $rol[mpa_amount]; } } 
$totalsg = array_sum($totalsubguestpayments);
echo "<tr><td>All Payments</td><td>$totalsg</td></tr>";
$finsg = $totalsubguestadditions - $totalsg;
echo "<tr><td>Total less payments </td><td>$finsg</td></tr></table>";
echo "</div>";
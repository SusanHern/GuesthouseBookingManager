<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";
echo "<form name='aform' action='salesd.php' method='post'>From<input type='date' name='from' />To<input type='date' name='to' /><input type='submit' name='submit' value='GO' /></form>";
function days_in_month($year, $month) {
return round((mktime(0, 0, 0, $month+1, 1, $year) - mktime(0, 0, 0, $month, 1, $year)) / 86400); } 
$today = date("Y-m");
$begmonth = $today . '-01';
$times = strtotime($begmonth);
$day = getdate($times);
$monthb = $day["mon"];
$yearb = $day["year"];
$daysinmonth = days_in_month($yearb, $monthb);
echo "$begmonth $daysinmonth<br />";
$endmonth = $today . '-' . $daysinmonth;
$q = $db->query("SELECT * FROM sales WHERE sa_date BETWEEN '$begmonth' AND '$endmonth'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'ACCOMODATION : ' . "</td><td>$row[sa_acname] </td></tr>";
echo "<tr><td>" . 'GUEST NAME : ' . "</td><td>$row[sa_guestname] </td></tr>";
echo "<tr><td>" . 'BOOKING ID : ' . "</td><td>$row[sa_bookingid] </td></tr>";
echo "<tr><td>" . 'BASIC : ' . "</td><td>$row[sa_amountnoadd] </td></tr>";
echo "<tr><td>" . 'GRAND TOTAL : ' . "</td><td>$row[sa_amountgrandtotal] </td></tr>";
echo "<tr><td>" . 'TOTAL DISCOUNTS : ' . "</td><td>$row[sa_discountstot] </td></tr>";
echo "<tr><td>" . 'TOTAL PAYMENTS : ' . "</td><td>$row[sa_paymentstot] </td></tr>";
echo "<tr><td>" . 'TOTAL ADDITIONS : ' . "</td><td>$row[sa_totadditions] </td></tr>";
echo "<tr><td>" . 'SALESTAX : ' . "</td><td>$row[sa_salestax] </td></tr>";
$grandtotalarray[] = $row[sa_amountgrandtotal];
$grandpayalarray[] = $row[sa_paymentstot];
$grandstaxalarray[] = $row[sa_salestax];
 } 
$total = array_sum($grandtotalarray);
$payments = array_sum($grandpayalarray);
$tax = array_sum($grandstaxalarray);
echo "<tr><td>" . 'TOTAL SALES : ' . "</td><td> </td><td>$total</td></tr>";
echo "<tr><td>" . 'TOTAL SALES TAX : ' . "</td><td> </td><td>$tax</td></tr>";
echo "<tr><td>" . 'TOTAL PAYMENTS RECEIVED : ' . "</td><td></td><td></td><td>$payments</td></tr>";
echo "</table>"; } else { 
echo "goodness"; } 

?> 

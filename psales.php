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
border-radius:15%;

color:navy;
border-bottom:1px dotted navy;
border-left: 1px solid navy;
padding:4px;
font-family: Verdana,Geneva,sans-serif; 
width:80px;
} 
#cl{display:none;}

table{border-radius:15%;
padding:5px;
background:white;}
</style>
<?php
include "bsl3.php";
echo "<div id='mab'>";
echo "<form action='psales.php' method='post'><b>From</b><input type='date' name='fr' /><b>To</b><input type='date' name='to' /><br /><input type='submit' name='submit' value='Go' /></form><br />";

$fromday = $_POST[fr];
$tomday = $_POST[to];
echo "$fromday $tomday";
$q = $db->query("SELECT * FROM sales WHERE sa_date BETWEEN '$fromday' AND '$tomday'");

while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table border='1'>";
echo "<tr><td>$row[sa_acname] </td>";
echo "<td>$row[sa_guestname] </td>";
echo "<td>" . '-' . "$row[sa_paymentstot] </td>";
echo "<td>$row[sa_amountgrandtotal] </td>";
$dina = cl . $row[sa_id];
echo "<td><button value='$dina' onclick='det(this.value);' class='itco'>More</button></td><td><button value='$dina' onclick='le(this.value);' class='itco'>Less</button></td></tr>";
echo "</table>";

echo "<div style='display:none;' id='$dina'><table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td >" . 'BOOKING ID : ' . "</td><td>$row[sa_bookingid] </td></tr>";
echo "<tr><td>" . 'BASIC : ' . "</td><td>$row[sa_amountnoadd] </td></tr>";
echo "<tr><td>" . 'TOTAL DISCOUNTS : ' . "</td><td>$row[sa_discountstot] </td></tr>";
echo "<tr><td>" . 'TOTAL ADDITIONS : ' . "</td><td>$row[sa_totadditions] </td></tr>";
echo "<tr><td>" . 'SALESTAX : ' . "</td><td>$row[sa_salestax] </td></tr></table></div>";
$grandtotalarray[] = $row[sa_amountgrandtotal];
$grandpayalarray[] = $row[sa_paymentstot];
$grandstaxalarray[] = $row[sa_salestax];
 } 
echo "</div>";
$total = array_sum($grandtotalarray);
$payments = array_sum($grandpayalarray);
$tax = array_sum($grandstaxalarray);
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'TOTAL SALES FOR MONTH: ' . "</td><td> </td><td>$total</td></tr>";
echo "<tr><td>" . 'TOTAL SALES TAX FOR MONTH: ' . "</td><td> </td><td>$tax</td></tr>";
echo "<tr><td>" . 'TOTAL PAYMENTS RECEIVED FOR MONTH: ' . "</td><td></td><td></td><td>$payments</td></tr>";
echo "</table></div>"; 

?> 
<script>
var rt;
function det(rt) { 
document.getElementById(rt).style.display = "block"; 

} 
function le(rt) { 
document.getElementById(rt).style.display = "none"; 

} 
</script>

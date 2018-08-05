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
error_reporting(0);
include "bsl3.php";

$id = $_REQUEST[id];

echo "<div id='mab'>";
$qta = $db->query("SELECT * FROM salestaxtb");
while($rota = $qta->fetchArray(SQLITE3_ASSOC ) )  { 
$taname = $rota[ta_name];
$taamount = $rota[ta_amount];
$tasy = $rota[ta_currsymbol];
$salestaxtype = $rota[ta_type];
 } 
$q = $db->query("SELECT * FROM paymentstb WHERE pa_booid = '$id'");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
$paname = $row[pa_name];
$paamount[] = $row[pa_amount];
$padates = $row[pa_date];
echo "<tr><td>PAYMENT DATES</td><td></td><td>$padates</td></tr>";

 } 
$patot = array_sum($paamount);
echo "<table border=1 cellspacing=0 cellpadding=2>";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
$to = $row[boo_tob];
$from = $row[boo_bfrom];
$date1=date_create($to);
$date2=date_create($from);
$diff=date_diff($date1,$date2);
$t = $diff->format("%a");
$length = intval($t);

if($row[boo_discountguests] > 0 && $row[boo_discountguests1] == 0) { 
$disges = $row[boo_rate] * ($row[boo_discountamount] / 100);
$guestdis = $row[boo_discountguests]; 
$disa = $guestdis * $disges;
$dislen1 = $length * $disa;

$ra = $length * ($row[boo_rate] * $row[boo_guestsadult]);
$dislength = $length * ($row[boo_rate]);
$totdis = $dislength - $dislen1;
$rat = $ra + $totdis; } 
elseif($row[boo_discountguests1] > 0 && $row[boo_discountguests] > 0 ) { 
$disges = $row[boo_rate] * ($row[boo_discountamount] / 100);
$guestdis = $row[boo_discountguests]; 
$disa = $guestdis * $disges;
$dislen1 = $length * $disa;

$ra = $length * ($row[boo_rate] * $row[boo_guestsadult]);
$dislength = $length * ($row[boo_rate]);
$totdis = $dislength - $dislen1;


$disgesb = $row[boo_rate] * ($row[boo_discountamount1] / 100);
$guestdisb = $row[boo_discountguests1]; 
$disb = $guestdisb * $disgesb;
$dislen1b = $length * $disb;



$totdisb = $dislength - $dislen1b;
$rat = $ra + $totdis + $totdisb;

 }else { 
$rat = $length * ($row[boo_rate] * $row[boo_guestsadult]); } 

echo "<tr><td>" . 'NUMBER OF DAYS : ' . "$length</td><td>TOTAL OWING $tasy $rat </td></tr>";
$allocate = $row[boo_accallocat]; } 


$qt = $db->query("SELECT * FROM addtobilltb WHERE bill_booid = '$id'");

while($ro = $qt->fetchArray(SQLITE3_ASSOC) ) { 
echo "<tr><td>$ro[bill_name]</td>";
echo "<td>$ro[bill_amount]</td></tr>"; 
$addedstot[] = $ro[bill_amount];

} 
$sum = array_sum($addedstot);
$tot = $rat + $sum;
$bal = $tot - $patot;
$amounttodiv = $taamount + 100;
if($salestaxtype == 'included') { 
$salestax = round($tot * $taamount / $amounttodiv, 2); } 
else { 
$salestax = round($tot * $taamount/100, 2);
} 

echo "<tr><td>Total with additions</td><td>$tasy $tot</td><td>Inc $taname $salestax</td></tr>";
echo "<tr><td>Less</td><td>Payments</td><td>$tasy $patot</td></tr>";
echo "<tr><td>Balance</td><td>Payments and Additions</td><td>$tasy $bal</td></tr>";
echo "</table></div>";
?>
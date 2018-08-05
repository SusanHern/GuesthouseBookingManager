<?php
include "bsl3.php";
$na = trim($_REQUEST[na]);
echo "naaa $na";
echo "na $na<br />";
$qpa = $db->query("SELECT * FROM multipaymentstb WHERE mpa_boolname = '$na'");
while($ropa = $qpa->fetchArray(SQLITE3_ASSOC) ) 
{ 
echo "id $ropa[pa_id]<br />";
echo "name $ropa[mpa_name]<br />";
$payamountr[] = $ropa[mpa_amount];
echo "amount $ropa[mpa_amount]<br />";
echo "method $ropa[mpa_method]<br />";
echo "ref $ropa[mpa_ref]<br />";
echo "date $ropa[mpa_date]<br />";
echo "booking id $ropa[mpa_booid]<br />";
} 
$payamount = array_sum($payamountr);
$q = $db->query("SELECT * FROM booking WHERE boo_multiaddedid = '$na' AND boo_status != 'COMPLETED'");
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 

$sname[] = $row[boo_lname];
$tel[] = $row[boo_tel];
$to = $row[boo_tob];
$from = $row[boo_bfrom];
$date1=date_create($to);
$date2=date_create($from);
$diff=date_diff($date1,$date2);
$t = $diff->format("%a");
$length = intval($t);

$guest = $row[boo_guestsadult];
$numguests[] = $row[boo_guestsadult];

$rate = ($guest * $length) * $row[boo_rate];

$tot[] = $rate; 
$acnames[] = $row[boo_acname];
$email[] = $row[boo_email];
$fro[] = $row[boo_bfrom];
$bto[] = $row[boo_tob];
$meals[] = $row[boo_meals];
$ra[] = $row[boo_rate];
$status[] = $row[boo_status];
$fname[] = $row[boo_fname];
$refe[] = $row[boo_gref];
$multibookid[] = $row[boo_multiaddedid];
$spinst[] = $row[boo_spinstruct];
} 
$multiid = $multibookid[0];
$refall = $refe[0];
$btoall = $bto[0];
$fromall = $fro[0];
$emailall = $email[0];
$telall = $tel[0];
$snameall = $sname[0];
$total = array_sum($tot);

$totalnumguests = array_sum($numguests);
$nam = implode(',', $acnames);
$spins = implode(',', $spinst);
$mealsall = implode(',', $meals);
$numunits = count($acnames);
$rateall = (array_sum($ra) / $numunits);
$statusall = $status[0];
$fnameall = implode(',', $fname);
$qta = $db->query("SELECT * FROM salestaxtb");
while($rota = $qta->fetchArray(SQLITE3_ASSOC ) )  { 
$taname = $rota[ta_name];
$taamount = $rota[ta_amount];
$tasy = $rota[ta_currsymbol];
 } 
$amounttodiv = $taamount + 100;
$salestax = round($total * $taamount / $amounttodiv, 2);
$qt = $db->query("SELECT * FROM addtobilltb WHERE bill_multiaddedid = '$na'");

while($ro = $qt->fetchArray(SQLITE3_ASSOC) ) { 
echo "<tr><td>$ro[bill_name]</td>";
echo "<td>$ro[bill_amount]</td></tr>"; 
$addedstot[] = $ro[bill_amount];

} 
$additions = array_sum($addedstot);
$fintot = $total + $additions;
$newtotal = $fintot - $payamount;
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$fnameall </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$snameall</td></tr>";
echo "<tr><td>" . 'TELEPHONE : ' . "</td><td>$telall </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$emailall </td></tr>";
echo "<tr><td>" . 'FROM : ' . "</td><td>$fromall </td></tr>";
echo "<tr><td>" . 'TO : ' . "</td><td>$btoall</td></tr>";
echo "<tr><td>" . 'ADULT GUESTS : ' . "</td><td>$totalnumguests </td></tr>";
echo "<tr><td>" . 'KIDS : ' . "</td><td>$row[boo_guestskids] </td></tr>";
echo "<tr><td>" . 'PETS : ' . "</td><td>$row[boo_pets] </td></tr>";
echo "<tr><td>" . 'CARS : ' . "</td><td>$row[boo_cars] </td></tr>";
echo "<tr><td>" . 'MEALS : ' . "</td><td>$mealsall </td></tr>";
echo "<tr><td>" . 'RATE : ' . "</td><td>$rateall </td></tr>";
echo "<tr><td>" . 'STATUS : ' . "</td><td>$statusall </td></tr>";
echo "<tr><td>" . 'MULTI ID : ' . "</td><td>$multiid </td></tr>";
echo "<tr><td>" . 'REFERENCE : ' . "</td><td>$refall </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$spins </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$nam</td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME : ' . "</td><td>$row[boo_discountname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT : ' . "</td><td>$row[boo_discountamount] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS : ' . "</td><td>$row[boo_discountguests] </td></tr>";
echo "<tr><td>" . 'TOTAL NUMBER OF GUESTS : ' . "</td><td></td><td>$totalnumguests </td></tr>";
echo "<tr><td>" . 'TOTAL OWING WITHOUT ADDITIONS : ' . "</td><td> TAX $salestax</td><td>$total </td></tr>";
echo "<tr><td>" . 'TOTAL OWING WITH ADDITIONS : ' . "</td><td>ADDITIONS $additions</td><td>$fintot </td></tr>";
echo "<tr><td>" . 'BALANCE LESS PAYMENTS : ' . "</td><td> PAYMENTS $payamount</td><td>$newtotal </td></tr>";
echo "</table>";


if($newtotal == 0) { 

$qzx = $db->query("UPDATE booking SET boo_status = 'COMPLETED' WHERE boo_multiaddedid = '$na'");
$today = date("Y-m-d");
$qzd = $db->query("INSERT INTO sales(sa_acname, sa_guestname, sa_bookingid, sa_amountnoadd, sa_amountgrandtotal, sa_paymentstot, sa_totadditions, sa_salestax, sa_date, sa_salestype, sa_multiaddedid) VALUES('$nam', '$snameall', '$multiid', '$total', '$fintot', '$payamount', '$additions', '$salestax', '$today', 'multi', '$multiid')"); } 
else { 
echo "This booking does not have a zero balance and cannot be completed"; } 
?>

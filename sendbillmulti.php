<?php

include "bsl3.php";
$id = ($_REQUEST[na]);
if(isset($_REQUEST[na]) ) { 

echo "<div id='mab'>";




$sql =<<<EOF
      SELECT * from businessdetails;
EOF;
$ret = $db->query($sql);
while($ro = $ret->fetchArray(SQLITE3_ASSOC ) )  { 
$name = $ro[bus_name];
$stna = ($ro[bus_streetname]);
$stno = ($ro[bus_streetno]);
$city = ($ro[bus_city]);
$postalcode = ($ro[postalcode]);

$mobile = ($ro[bus_mobilephone]);
$address = "$stno" . ' ' . "$stna" . ' ' . "$city" . ' ' . "$postalcode"; } 
$q = $db->query("SELECT * FROM booking WHERE boo_lname = '$id'");
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "$row[boo_lname]<br />"; } 

$q = $db->query("SELECT * FROM booking WHERE boo_multiaddedid = '$id'");
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
} 
$ref = $refe[0];
$btoall = $bto[0];
$fromall = $fro[0];
$emailall = $email[0];
$telall = $tel[0];
$snameall = $sname[0];
$total = array_sum($tot);
$totalnumguests = array_sum($numguests);
$nam = implode(',', $acnames);
$mealsall = implode(',', $meals);
$rateall = $ra[0];
$statusall = $status[0];
$fnameall = implode(',', $fname);
$qta = $db->query("SELECT * FROM salestaxtb");
while($rota = $qta->fetchArray(SQLITE3_ASSOC ) )  { 
$taname = $rota[ta_name];
$taamount = $rota[ta_amount];
$tasy = $rota[ta_currsymbol];
$salestaxtype = $rota[ta_type]; 
 } 


$qt = $db->query("SELECT * FROM addtobilltb WHERE bill_multiaddedid = '$id'");

while($ro = $qt->fetchArray(SQLITE3_ASSOC) ) { 
echo "<tr><td>$ro[bill_name]</td>";
echo "<td>$ro[bill_amount]</td></tr>"; 
$addedstot[] = $ro[bill_amount]; } 
$sum = array_sum($addedstot);
$grandtotal = $sum + $total;
$amounttodiv = $taamount + 100;
if($salestaxtype == 'included') { 
$salestax = round($grandtotal * $taamount / $amounttodiv, 2); } 
else { 
$salestax = round($grandtotal * $taamount/100, 2);
} 
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
echo "<tr><td>" . 'PAYMENT REFERENCE : ' . "</td><td>$ref </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[boo_spinstruct] </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$nam</td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME : ' . "</td><td>$row[boo_discountname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT : ' . "</td><td>$row[boo_discountamount] </td></tr>";
echo "<tr><td>" . 'ADDITIONS : ' . "</td><td>$sum </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS : ' . "</td><td>$row[boo_discountguests] </td></tr>";
echo "<tr><td>" . 'TOTAL NUMBER OF GUESTS : ' . "</td><td></td><td>$totalnumguests </td></tr>";
echo "<tr><td>" . 'TOTAL OWING WITHOUT ADDITIONS : ' . "</td><td> TAX $salestax</td><td>$total </td>";
echo "<tr><td>" . 'TOTAL OWING WITH ADDITIONS : ' . "</td><td> </td><td>$grandtotal </td></tr></table>";
$qre = $db->query("SELECT * FROM resourcesem");
echo "<center>";
while($rowre = $qre->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "$rowre[res_id]";
$image = $rowre[re_image];
$link1 = $rowre[re_link1];
$link2 = $rowre[re_link2];
$link3 = $rowre[re_link3];
$link4 = $rowre[re_link4];
$emai = $rowre[re_emai];
$linkname1 = $rowre[res_linkname1];
$linkname2 = $rowre[res_linkname2];
$linkname4 = $rowre[res_linkname4];
echo "<tr><td>" . 'IMAGE : ' . "</td><td>$rowre[re_image] </td></tr>";
echo "<tr><td>" . 'LINK 1 : ' . "</td><td>$rowre[re_link1] </td></tr>";
echo "<tr><td>" . 'LINK 2 : ' . "</td><td>$rowre[re_link2] </td></tr>";
echo "<tr><td>" . 'LINK 3 : ' . "</td><td>$rowre[re_link3] </td></tr>";
echo "<tr><td>" . 'LINK 4 : ' . "</td><td>$rowre[re_link4] </td></tr>";
echo "<tr><td>" . 'Our Email : ' . "</td><td>$rowre[re_emai] </td></tr>"; 
echo "</table></center>";
echo "<form action='sendem6.php' method='post'>
<input type='text' name='image' value='$image' /><br />
<input type='text' name='link1' value='$link1' /><br />
<input type='text' name='link2' value='$link2' /><br />
<input type='text' name='link3' value='$link3' /><br />
<input type='text' name='link4' value='$link4' /><br />
<input type='text' name='linkname1' value='$linkname1' /><br />
<input type='text' name='linkname2' value='$linkname2' /><br />
<input type='text' name='linkname4' value='$linkname4' /><br />
<input type='text' name='emai' value='$emai' /><br />
<input type='text' name='name' value='$name' /><br />
<input type='text' name='address' value='$address' /><br />
<input type='text' name='phone' value='$phone' /><br />
<input type='text' name='mobile' value='$mobile' /><br />
<input type='text' name='acname' value='$nam' /><br />
<input type='text' name='guestname' value='$snameall' /><br />
<input type='text' name='numofguests' value='$totalnumguests' /><br />
<input type='text' name='bfrom' value='$fromall' /><br />
<input type='text' name='tob' value='$btoall' /><br />
<input type='text' name='numdays' value='$length' /><br />
<input type='text' name='payref' value='$ref' /><br />
<input type='text' name='total' value='$rat' /><br />
<input type='text' name='sum' value='$sum' /><br />
<input type='text' name='grandtotal' value='$grandtotal' /><br />
<input type='text' name='salestax' value='$salestax' /><br />
<input type='text' name='guestemail' value='$emailall' /><br />
<textarea rows='20' cols='20' name='notes'></textarea><br />
<input type='submit' name='submit' value='Send' /></ form>"; 
 } 
echo "</div>"; } 

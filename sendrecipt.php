<?php

include "bsl3.php";
$id = intval($_REQUEST[id]);
if(isset($_REQUEST[id]) ) { 

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

echo "<table border=1 cellspacing=0 cellpadding=2>";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
$acname = $row[boo_acname];
$guest = $row[boo_fname] . ' ' . $row[boo_lname];
$numguestf = $row[boo_guestsadult] + $row[boo_guestskids] + $row[boo_discountguests] + $row[boo_discountguests1];
$ref = $row[boo_gref];
$em = $row[boo_email];
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


echo "<tr><td>" . 'NUMBER OF DAYS : ' . "$length</td><td>TOTAL OWING $rat </td></tr>";
$allocate = $row[boo_accallocat]; } 
$q = $db->query("SELECT * FROM paymentstb WHERE pa_booid = '$id'");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
$paname = $row[pa_name];
$paamount[] = $row[pa_amount];
$padates = $row[pa_date];
echo "<tr><td>PAYMENT DATES</td><td></td><td>$padates</td></tr>";

 } 
$patot = array_sum($paamount);


$qt = $db->query("SELECT * FROM addtobilltb WHERE bill_booid = '$id'");

while($ro = $qt->fetchArray(SQLITE3_ASSOC) ) { 
echo "<tr><td>$ro[bill_name]</td>";
echo "<td>$ro[bill_amount]</td></tr>"; 
$addedstot[] = $ro[bill_amount];

} 
if(is_array($addedstot) )  { 
$sum = array_sum($addedstot);
$tot = $rat + $sum; } else { 
$tot = $rat;

}
$fintot = $tot - $patot;
$qta = $db->query("SELECT * FROM salestaxtb");
while($rota = $qta->fetchArray(SQLITE3_ASSOC ) )  { 
$taname = $rota[ta_name];
$taamount = $rota[ta_amount];
$tasy = $rota[ta_currsymbol];
$salestaxtype = $rota[ta_type];
 } 
$amounttodiv = $taamount + 100;
if($salestaxtype == 'included') { 
$salestax = round($tot * $taamount / $amounttodiv, 2); } 
else { 
$salestax = round($tot * $taamount/100, 2);
} 

echo "<tr><td>Total with additions</td><td>TOTAL</td><td> $tot</td><td>Salestax $salestax</td></tr>";
echo "<tr><td>Total less payments</td><td>PAYMENTS </td><td>" . '-' . " $patot </td><td>BALANCE $fintot</td></tr>";
echo "</table><br />";
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
$linkname1 = $rowre[res_linkname1];
$linkname2 = $rowre[res_linkname2];
$linkname4 = $rowre[res_linkname4];
$emai = $rowre[re_emai];
echo "<tr><td>" . 'IMAGE : ' . "</td><td>$rowre[re_image] </td></tr>";
echo "<tr><td>" . 'LINK 1 : ' . "</td><td>$rowre[re_link1] </td></tr>";
echo "<tr><td>" . 'LINK 2 : ' . "</td><td>$rowre[re_link2] </td></tr>";
echo "<tr><td>" . 'LINK 3 : ' . "</td><td>$rowre[re_link3] </td></tr>";
echo "<tr><td>" . 'LINK 4 : ' . "</td><td>$rowre[re_link4] </td></tr>";
echo "<tr><td>" . 'LINK NAME 1 : ' . "</td><td>$rowre[res_linkname1] </td></tr>";
echo "<tr><td>" . 'LINK NAME 2 : ' . "</td><td>$rowre[res_linkname2] </td></tr>";

echo "<tr><td>" . 'LINK NAME 4 : ' . "</td><td>$rowre[res_linkname4] </td></tr>";
echo "<tr><td>" . 'Our Email : ' . "</td><td>$rowre[re_emai] </td></tr>"; 
echo "</table></center>";
echo "<form action='sendre2.php' method='post'>
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
<input type='text' name='acname' value='$acname' /><br />
<input type='text' name='guestname' value='$guest' /><br />
<input type='text' name='numofguests' value='$numguestf' /><br />
<input type='text' name='bfrom' value='$from' /><br />
<input type='text' name='tob' value='$to' /><br />
<input type='text' name='numdays' value='$length' /><br />
<input type='text' name='total' value='$rat' /><br />
<input type='text' name='sum' value='$sum' /><br />
<b>Grandtotal</b>
<input type='text' name='grandtotal' value='$tot' /><br />
<input type='text' name='salestax' value='$salestax' /><br />
<input type='text' name='payments' value='$patot' /><br />
<input type='text' name='ref' value='$ref' /><br />
<input type='text' name='guestemail' value='$em' /><br />
<textarea rows='20' cols='20' name='notes'></textarea><br />
<input type='submit' name='submit' value='Send' /></ form>"; } } 
?></div>
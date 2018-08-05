<?php
$id = $_REQUEST[id];
echo "$id";
<?php

include "bsl3.php";
$q = $db->query("SELECT * FROM cancellation1 WHERE cboo_id = '$id' ORDER BY cboo_lname");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[cboo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[cboo_lname] </td></tr>";
echo "<tr><td>" . 'TELEPHONE : ' . "</td><td>$row[cboo_tel] </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$row[cboo_email] </td></tr>";
echo "<tr><td>" . 'FROM : ' . "</td><td>$row[cboo_bfrom] </td></tr>";
echo "<tr><td>" . 'TO : ' . "</td><td>$row[cboo_tob] </td></tr>";
echo "<tr><td>" . 'ADULT GUESTS : ' . "</td><td>$row[cboo_guestsadult] </td></tr>";
echo "<tr><td>" . 'KIDS : ' . "</td><td>$row[cboo_guestskids] </td></tr>";
echo "<tr><td>" . 'PETS : ' . "</td><td>$row[cboo_pets] </td></tr>";
echo "<tr><td>" . 'CARS : ' . "</td><td>$row[cboo_cars] </td></tr>";
echo "<tr><td>" . 'MEALS : ' . "</td><td>$row[cboo_meals] </td></tr>";
echo "<tr><td>" . 'RATE : ' . "</td><td>$row[cboo_rate] </td></tr>";
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[cboo_status] </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[cboo_spinstruct] </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$row[cboo_acname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME : ' . "</td><td>$row[cboo_discountname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT : ' . "</td><td>$row[cboo_discountamount] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS : ' . "</td><td>$row[cboo_discountguests] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME 1 : ' . "</td><td>$row[cboo_discountname1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT 1 : ' . "</td><td>$row[cboo_discountamount1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS 1 : ' . "</td><td>$row[cboo_discountguests1] </td></tr>";
$to = $row[cboo_tob];
$from = $row[cboo_bfrom];
$date1=date_create($to);
$date2=date_create($from);
$diff=date_diff($date1,$date2);
$t = $diff->format("%a");
$length = intval($t);
if($row[cboo_discountguests] > 0 && $row[cboo_discountguests1] == 0) { 
$disges = $row[cboo_rate] * ($row[cboo_discountamount] / 100);
$guestdis = $row[cboo_discountguests]; 
$disa = $guestdis * $disges;
$dislen1 = $length * $disa;
echo "totaldiscount $dislen1<br />";
echo "nn discount $disges";
$ra = $length * ($row[cboo_rate] * $row[cboo_guestsadult]);
$dislength = $length * ($row[cboo_rate]);
$totdis = $dislength - $dislen1;
$rat = $ra + $totdis; } 
elseif($row[cboo_discountguests1] > 0 && $row[cboo_discountguests] > 0 ) { 
$disges = $row[cboo_rate] * ($row[cboo_discountamount] / 100);
$guestdis = $row[cboo_discountguests]; 
$disa = $guestdis * $disges;
$dislen1 = $length * $disa;
echo "totaldiscount $dislen1<br />";
echo "discount a discounta $disges";
$ra = $length * ($row[cboo_rate] * $row[cboo_guestsadult]);
$dislength = $length * ($row[boo_rate]);
$totdis = $dislength - $dislen1;


$disgesb = $row[cboo_rate] * ($row[cboo_discountamount1] / 100);
$guestdisb = $row[cboo_discountguests1]; 
$disb = $guestdisb * $disgesb;
$dislen1b = $length * $disb;
echo "totaldiscountb $dislen1b<br />";
echo "xx discountb $disgesb";


$totdisb = $dislength - $dislen1b;
$rat = $ra + $totdis + $totdisb;

 }else { 
$rat = $length * ($row[cboo_rate] * $row[cboo_guestsadult]); } 
echo "totaldis price $totdisb<br />";
echo "<tr><td>" . 'NUMBER OF DAYS : ' . "$length</td><td>TOTAL OWING $rat </td></tr>";
$allocate = $row[cboo_accallocat];
echo "<br /><a href='reinstatebooking.php?id=$row[cboo_id]'>Reinstate</a><br />"; 

$qt = $db->query("INSERT INTO booking(boo_fname, boo_lname, boo_tel, boo_email, boo_guestsadult, boo_guestskids, boo_status, boo_bfrom, boo_tob, boo_spinstruct, boo_meals, boo_cars, boo_pets, boo_rate, boo_accallocat, boo_acname,
boo_discountname,
boo_discountamount,
boo_discountguests,
boo_discountid,
boo_discountname1,
boo_discountamount1,
boo_discountguests1,
boo_discountid1, boo_type) VALUES('$row[cboo_fname]', '$row[cboo_lname]', '$row[cboo_tel]', '$row[cboo_email]', '$row[cboo_guestsadult]', '$row[cboo_guestskids]', '$row[cboo_status]', '$row[cboo_bfrom]', '$row[cboo_tob]', '$row[cboo_spinstruct]', '$row[cboo_meals]', '$row[cboo_cars]', '$row[cboo_pets]', '$row[cboo_rate]', '$row[cboo_accallocat]', '$row[cboo_acname]',
'$row[cboo_discountname]',
'$row[cboo_discountamount]',
'$row[cboo_discountguests]',
'$row[cboo_discountid]',
'$row[cboo_discountname1]',
'$row[cboo_discountamount1]',
'$row[cboo_discountguests1]',
'$row[cboo_discountid1]', '$row[cboo_type]')");





} 

$db->query("DELETE FROM cancellation1 WHERE cboo_id = '$id'"); 


echo "</table>"; 
echo "</center>";
?> 

<?php

include "bsl3.php";
$q = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' ORDER BY boo_lname");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
echo "<tr><td>" . 'TELEPHONE : ' . "</td><td>$row[boo_tel] </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$row[boo_email] </td></tr>";
echo "<tr><td>" . 'FROM : ' . "</td><td>$row[boo_bfrom] </td></tr>";
echo "<tr><td>" . 'TO : ' . "</td><td>$row[boo_tob] </td></tr>";
echo "<tr><td>" . 'ADULT GUESTS : ' . "</td><td>$row[boo_guestsadult] </td></tr>";
echo "<tr><td>" . 'KIDS : ' . "</td><td>$row[boo_guestskids] </td></tr>";
echo "<tr><td>" . 'PETS : ' . "</td><td>$row[boo_pets] </td></tr>";
echo "<tr><td>" . 'CARS : ' . "</td><td>$row[boo_cars] </td></tr>";
echo "<tr><td>" . 'MEALS : ' . "</td><td>$row[boo_meals] </td></tr>";
echo "<tr><td>" . 'RATE : ' . "</td><td>$row[boo_rate] </td></tr>";
echo "<tr><td>" . 'MULTI ID : ' . "</td><td>$row[boo_multiaddedid] </td></tr>";
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";
echo "<tr><td>" . 'TYPE : ' . "</td><td>$row[boo_type] </td></tr>";
echo "<tr><td>" . 'MULTITYPE : ' . "</td><td>$row[boo_multitype] </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[boo_spinstruct] </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$row[boo_acname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME : ' . "</td><td>$row[boo_discountname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT : ' . "</td><td>$row[boo_discountamount] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS : ' . "</td><td>$row[boo_discountguests] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME 1 : ' . "</td><td>$row[boo_discountname1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT 1 : ' . "</td><td>$row[boo_discountamount1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS 1 : ' . "</td><td>$row[boo_discountguests1] </td></tr>";
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
echo "totaldiscount $dislen1<br />";
echo "nn discount $disges";
$ra = $length * ($row[boo_rate] * $row[boo_guestsadult]);
$dislength = $length * ($row[boo_rate]);
$totdis = $dislength - $dislen1;
$rat = $ra + $totdis; } 
elseif($row[boo_discountguests1] > 0 && $row[boo_discountguests] > 0 ) { 
$disges = $row[boo_rate] * ($row[boo_discountamount] / 100);
$guestdis = $row[boo_discountguests]; 
$disa = $guestdis * $disges;
$dislen1 = $length * $disa;
echo "totaldiscount $dislen1<br />";
echo "discount a discounta $disges";
$ra = $length * ($row[boo_rate] * $row[boo_guestsadult]);
$dislength = $length * ($row[boo_rate]);
$totdis = $dislength - $dislen1;


$disgesb = $row[boo_rate] * ($row[boo_discountamount1] / 100);
$guestdisb = $row[boo_discountguests1]; 
$disb = $guestdisb * $disgesb;
$dislen1b = $length * $disb;
echo "totaldiscountb $dislen1b<br />";
echo "xx discountb $disgesb";


$totdisb = $dislength - $dislen1b;
$rat = $ra + $totdis + $totdisb;

 }else { 
$rat = $length * ($row[boo_rate] * $row[boo_guestsadult]); } 
echo "totaldis price $totdisb<br />";
echo "<tr><td>" . 'NUMBER OF DAYS : ' . "$length</td><td>TOTAL OWING $rat </td></tr>";
$allocate = $row[boo_accallocat]; } 




echo "</table>"; 
echo "</center>";
?> 
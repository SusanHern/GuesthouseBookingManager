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
$q = $db->query("SELECT * FROM cancellation1 ORDER BY cboo_lname");
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
echo "<br /><a href='reinstatebooking.php?id=$row[cboo_id]'>Reinstate</a><br />"; } 




echo "</table>"; 
echo "</center>";
?> 
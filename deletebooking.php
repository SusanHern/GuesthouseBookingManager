<?php
$id = $_REQUEST[id];


include "bsl3.php";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
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
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[boo_spinstruct] </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$row[boo_acname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME : ' . "</td><td>$row[boo_discountname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT : ' . "</td><td>$row[boo_discountamount] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS : ' . "</td><td>$row[boo_discountguests] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME 1 : ' . "</td><td>$row[boo_discountname1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT 1 : ' . "</td><td>$row[boo_discountamount1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS 1 : ' . "</td><td>$row[boo_discountguests1] </td></tr>";
echo "</table>"; 
$qt = $db->query("INSERT INTO cancellation1(cboo_fname, cboo_lname, cboo_tel, cboo_email, cboo_guestsadult, cboo_guestskids, cboo_status, cboo_bfrom, cboo_tob, cboo_spinstruct, cboo_meals, cboo_cars, cboo_pets, cboo_rate, cboo_accallocat, cboo_acname,
cboo_discountname,
cboo_discountamount,
cboo_discountguests,
cboo_discountid,
cboo_discountname1,
cboo_discountamount1,
cboo_discountguests1,
cboo_discountid1, cboo_type, cboo_booid) VALUES('$row[boo_fname]', '$row[boo_lname]', '$row[boo_tel]', '$row[boo_email]', '$row[boo_guestsadult]', '$row[boo_guestskids]', '$row[boo_status]', '$row[boo_bfrom]', '$row[boo_tob]', '$row[boo_spinstruct]', '$row[boo_meals]', '$row[boo_cars]', '$row[boo_pets]', '$row[boo_rate]', '$row[boo_accallocat]', '$row[boo_acname]',
'$row[boo_discountname]',
'$row[boo_discountamount]',
'$row[boo_discountguests]',
'$row[boo_discountid]',
'$row[boo_discountname1]',
'$row[boo_discountamount1]',
'$row[boo_discountguests1]',
'$row[boo_discountid1]', '$row[boo_type]', '$id')"); } 
echo "<h2>$id Booking number has been deleted</h2><br />";
$db->query("DELETE FROM booking WHERE boo_id = '$id'"); 
?>
    
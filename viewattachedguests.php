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
$na = $_REQUEST[na];
echo "<div id='mab'>";
$q = $db->query("SELECT * FROM booking WHERE boo_multiaddedid = '$na'");
while($row = $q->fetchArray(SQLITE3_ASSOC)) { 
echo "$row[boo_lname]<br />";
echo "$row[boo_acname]<br />";
echo "$row[boo_id]<br />";
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
echo "<tr><td>" . 'SUBGUESTS : ' . "</td><td>$row[boo_subguestname] </td></tr>";
echo "<tr><td>" . 'SUBGUEST CONTACT : ' . "</td><td>$row[boo_subguesttel] </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[boo_spinstruct] </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$row[boo_acname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME : ' . "</td><td>$row[boo_discountname] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT : ' . "</td><td>$row[boo_discountamount] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS : ' . "</td><td>$row[boo_discountguests] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NAME 1 : ' . "</td><td>$row[boo_discountname1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT AMOUNT 1 : ' . "</td><td>$row[boo_discountamount1] </td></tr>";
echo "<tr><td>" . 'DISCOUNT NUMBER OF GUESTS 1 : ' . "</td><td>$row[boo_discountguests1] </td></tr>";

} 
?></div>
<?php
include "bsl3.php";
$q = $db->query("SELECT * FROM multipaymentstb");
while($row = $q->fetchArray(SQLITE3_ASSOC) ) 
{ 
echo "id $row[pa_id]<br />";
echo "name $row[mpa_name]<br />";
echo "amount $row[mpa_amount]<br />";
echo "method $row[mpa_method]<br />";
echo "ref $row[mpa_ref]<br />";
echo "date $row[mpa_date]<br />";
echo "booking id $row[mpa_booid]<br />";
echo "booking id $row[mpa_boolname]<br />";
} 
?>
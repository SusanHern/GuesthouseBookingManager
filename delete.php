<?php
$id = $_REQUEST[id];


include "bsl3.php";
echo "<h2>$id Booking number has been deleted</h2><br />";
$db->query("DELETE FROM sales WHERE sa_bookingid = '69'");
?>
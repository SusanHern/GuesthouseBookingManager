
<?php
include "bsl3.php";
if(!isset($_POST[submit]) ) { 
echo "<div id='mab'><form action='$_SERVER[PHP_SELF]' onsubmit='return validateForm();' name='rform' method='post'>
<b>Type Deduction Name eg: Float</b><br />
<input type='text' name='pt_name'><br />
<b>Amount</b><br />
<input type='text' name='pt_amount'><br />
<br /><input type='submit' name='submit' value='Submit'>
</form></div>"; } else { 
$name = $_POST[pt_name]; 
$amount = $_POST[pt_amount];
$type = 'less';
$date = date("Y-m-d H:i:s");
$q = $db->query("INSERT INTO petty(pt_amount, pt_name, pt_type, pt_date) VALUES('$amount', '$name', '$type', '$date')");


} 
?>
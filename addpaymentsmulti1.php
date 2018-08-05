<style>
b{width:100px;
word-wrap:normal;}
</style>
<script>
function validateForm()
{
var x=document.forms["rform"]["pa_name"].value;
if (x==null || x=="")
  {
  alert("Payment name must be filled out");
  return false;
  } 


var xc=document.forms["rform"]["pa_amount"].value;
if (xc==null || xc=="")
  {
  alert("Amount must be supplied");
  return false;
  } 

} 
</script>
<?php
include "bsl3.php";
$id = $_REQUEST[na];
echo "$id";

$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "$row[boo_multigtotal]";
echo "$row[boo_lname]";
$ref = $row[boo_gref]; } 
echo "<div id='mab'><form action='praddpaymulti.php' onsubmit='return validateForm();' name='rform' method='post'>
<b>Payment Name </b><br />
<input type='text' name='pa_name'><br />
<b>Amount</b><br />
<input type='text' name='pa_amount'><br />
<b>Payment Date</b><br />
<input type='date' name='pa_date'><br />
<input type='text' name='pa_bookingid' value='$id'/><br />
<b>Method</b><br />
<textarea rows='10' cols='10' name='pa_method' ></textarea><br />
<b>Payment Reference</b><input type='text' value='$ref' name='pa_ref' />
<br /><input type='submit' name='submit' value='Submit'>
</form></div>";
?>

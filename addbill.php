<script>
function validateForm()
{
var x=document.forms["rform"]["bill_name"].value;
if (x==null || x=="")
  {
  alert("Addition must be filled out");
  return false;
  } 


var xc=document.forms["rform"]["bill_amount"].value;
if (xc==null || xc=="")
  {
  alert("Amount must be supplied");
  return false;
  } 

} 
</script>
<?php
include "bsl3.php";
$id = $_REQUEST[id];
echo "<div id='mab'><form action='praddbill.php' onsubmit='return validateForm();' name='rform' method='post'>
<b>Type Addition Name </b><br />
<input type='text' name='bill_name'><br />
<b>Amount</b><br />
<input type='text' name='bill_amount'><br />
<input type='text' name='bill_bookingid' value='$id'/><br />
<b>Description</b><br />
<textarea rows='10' cols='10' name='bill_desc' ></textarea>
<br /><input type='submit' name='submit' value='Submit'>
</form></div>";
?>

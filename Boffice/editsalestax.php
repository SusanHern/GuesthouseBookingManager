<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";


$q = $db->query("SELECT * FROM salestaxtb");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[ta_name]<br />";
echo "<b>Amount </b> $row[ta_amount]<br />";
echo "<b>Currency Name</b> $row[ta_currname]<br />";
echo "<b>Type </b> $row[ta_type]<br />";
echo "<b>Symbol </b> $row[ta_currsymbol]<br />";
echo "<b>Description </b> $row[ta_desc]<br />";
echo "<form action='preditsalestax.php' onsubmit='return validateForm();' name='rform' method='post'>
<b>Sales Tax Name </b><br />
<input type='text' name='ta_name' value='$row[ta_name]' /><br />
<b>Tax Rate as Percent</b><br />
<input type='text' name='ta_amount' value='$row[ta_amount]' /><br />
<b>Enter Currency Name</b><br />
<input type='text' name='ta_currname' value='$row[ta_currname]' /><br />
<b>Enter Currency Symbol</b><br />
<input type='text' name='ta_currsymbol' value='$row[ta_currsymbol]'><br />
<select name='ta_type'><br />
<option value='included'>Inclusive</option><br />
<option value='excluded'>Exclusive</option><br />
</select><br />
<b>Description</b><br />
<textarea rows='10' cols='10' name='ta_desc' >$row[ta_descp]</textarea>";
echo "<input type='text' name='id' value='$row[ta_id]' />";
echo "<br /><input type='submit' name='submit' value='Submit'>
</form>";
 } } else { 
echo "goodness"; } 
?>
<script>
function validateForm()
{
var x=document.forms["rform"]["ta_name"].value;
if (x==null || x=="")
  {
  alert("Title must be filled out");
  return false;
  } 


var xc=document.forms["rform"]["ta_amount"].value;
if (xc==null || xc=="")
  {
  alert("Amount must be supplied");
  return false;
  } 
var xc=document.forms["rform"]["ta_curr"].value;
if (xc==null || xc=="")
  {
  alert("Currency must be supplied");
  return false;
  } 
var xc=document.forms["rform"]["ta_currsymbol"].value;
if (xc==null || xc=="")
  {
  alert("Currency Symbol must be supplied");
  return false;
  } 
} 
</script>
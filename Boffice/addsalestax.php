<?php
session_start();

if(isset($_SESSION[us]) ) { 
include "bsl3.php"; 
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




<?php

$ret = $db->query("SELECT * from salestaxtb");
while($ro = $ret->fetchArray(SQLITE3_ASSOC ) )  { 
$bus_id = ($ro[ta_id]); } 
if($bus_id >  0) { 
echo "You have already completed this process"; } else { 

echo "<form action='prsalestax.php' onsubmit='return validateForm();' name='rform' method='post'>
<b>Sales Tax Name </b><br />
<input type='text' name='ta_name'><br />
<b>Tax Rate as Percent</b><br />
<input type='text' name='ta_amount'><br />
<b>Enter Currency Name</b><br />
<input type='text' name='ta_currname'><br />
<b>Enter Currency Symbol</b><br />
<input type='text' name='ta_currsymbol'><br />
<select name='ta_type'><br />
<option value='included'>Inclusive</option><br />
<option value='excluded'>Exclusive</option><br />
</select><br />
<b>Description</b><br />
<textarea rows='10' cols='10' name='ta_desc' ></textarea>
<br /><input type='submit' name='submit' value='Submit'>
</form>";
?> 
<?php
echo " "; } } else { 
} 
?> 
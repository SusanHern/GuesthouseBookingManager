<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";
?>
<script>
function validateForm()
{
var x=document.forms["rform"]["dis_name"].value;
if (x==null || x=="")
  {
  alert("Title must be filled out");
  return false;
  } 


var xc=document.forms["rform"]["dis_amount"].value;
if (xc==null || xc=="")
  {
  alert("Amount must be supplied");
  return false;
  } 

} 
</script>

<div id='mab'><form action="prdiscount.php" onsubmit='return validateForm();' name='rform' method="post">
<b>Discount Name </b><br />
<input type='text' name='dis_name'><br />
<b>Discount Amount</b><br />
<input type='text' name='dis_amount'><br />
<b>Description</b><br />
<textarea rows='10' cols='10' name='dis_desc' ></textarea>
<br /><input type='submit' name='submit' value='Submit'>
</form></div>
<?php 
echo " "; } else { } 
?>
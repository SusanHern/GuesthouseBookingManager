<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";

$id = $_REQUEST[id];


$q = $db->query("SELECT * FROM discount WHERE dis_id = '$id'");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[dis_name]<br />";
echo "<b>Amount </b> $row[dis_amount]<br />";

echo "<b>Description </b> $row[dis_descp]<br />";
echo "<form action='preditdiscount.php' onsubmit='return validateForm();' name='rform' method='post'>
<b>Discount Name </b><br />
<input type='text' name='dis_name' value='$row[dis_name]' /><br />
<b>Discount Amount</b><br />
<input type='text' name='dis_amount' value='$row[dis_amount]' /><br />
<b>Enter Currency Name</b><br />

<b>Description</b><br />
<textarea rows='10' cols='10' name='dis_desc' >$row[dis_descp]</textarea>";
echo "<input type='text' name='id' value='$row[dis_id]' />";
echo "<br /><input type='submit' name='submit' value='Submit'>
</form>";
 } } else { 
echo "goodness"; } 
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
<?php
session_start();

if(isset($_SESSION[us]) ) { 
include "bsl3.php";
?>
<script>
function validateForm()
{
var x=document.forms["rform"]["ps1"].value;
if (x==null || x=="")
  {
  alert("Password must be filled out");
  return false;
  } 


var xc=document.forms["rform"]["ps2"].value;
if (xc==null || xc=="")
  {
  alert("Repeat password must be supplied");
  return false;
  } 

} 
</script>
<?php

if(!isset($_POST[submit] ) ) { 
echo "<form name='rform' onsubmit='return validateForm();' action='$_SERVER[PHP_SELF]' method='post'>
<b>New Password</b><input type='password' name='ps1' /><br />
<b>New Password Again</b><input type='password' name='ps2' /><br />
<input type='submit' name='submit' value='Change Password' /></form>"; } 
else { 
$ps1 = $_POST[ps1];
$ps2 = $_POST[ps2];
if($ps1 == $ps2) { 
$ps3 = md5($ps1);
$q = $db->query("UPDATE am SET am2 = '$ps3' WHERE am1 = 'Admin'");
}
else { 
echo "You have not entered your new password correctly<a href='changepassword.php'>Go back and try again</a>";
} } } else { 
echo "goodness"; } 
?> 



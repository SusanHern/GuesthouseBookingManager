<?php
session_start();

if(isset($_SESSION[us]) ) { 



include "bsl3.php";

echo "<div id='mab'><h2>ADD RESOURCES FOR EMAILS<h2>
<form name='boo' class='form' action='processres.php' method='post'>
<b>LINK TO ONLINE IMAGE</b><input type='text' value='http://' name='image' /><br />
<b>LINK NAME 1 EG: DIRECTIONS</b><input type='text' name='linkname1' /><br />
<b>LINK 1 TO PDF EG: DIRECTIONS</b><input type='text' value='http://' name='link1' /><br />
<b>LINK NAME 2 EG: INFORMATION</b><input type='text' name='linkname2' /><br />
<b>LINK TO PDF EG: INFORMATION</b><input type='text' value='http://' name='link2' /><br />

<b>LINK TO WEBSITE</b><input type='text' value='http://' name='link3' /><br />
<b>LINK NAME 3 EG: BANKING DETAILS FOR DEPOSIT</b><input type='text' name='linkname4' /><br />
<b>LINK TO OTHER RESOURSCE</b><input type='text' value='http://' name='link4' /><br />
<b>Your Email to send</b><input type='text'  name='emai' /><br />
<input type='submit' class='submit' name='submit' value='Add RESOURCES' /></form></div>"; } else { 
echo "goodness"; } 
?>

<script>
function validateForm()
{
var x=document.forms["rform"]["fname"].value;
if (x==null || x=="")
  {
  alert("Title must be filled out");
  return false;
  } 


var xc=document.forms["rform"]["sname"].value;
if (xc==null || xc=="")
  {
  alert("Surname must be supplied");
  return false;
  } 
var xcf=document.forms["rform"]["email"].value;
if (xcf==null || xcf=="")
  {
  alert("Email must be supplied");
  return false;
  } 
} 
</script>
<?php
include "bsl3.php";


$id = $_REQUEST[boid];
echo "$id";


$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
echo "<div id='mab'>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
$fname = $row[boo_fname];
$sname = $row[boo_lname];
$tel = $row[boo_tel];
$email = $row[boo_email];
$bfrom = $row[boo_bfrom];
$tob = $row[boo_tob];
$adult = $row[boo_guestsadult];
$kids = $row[boo_guestskids];
$cars = $row[boo_cars];
$meals = $row[boo_meals];
$rate = $row[boo_rate];
$status = $row[boo_status];
$sp = $row[boo_spinstruct];
$ac = $row[boo_acname];
echo "<table cellspacing='0' border='1' cellpadding='5'>";
echo "<tr><td>" . 'FIRST NAME : ' . "</td><td>$row[boo_fname] </td></tr>";
echo "<tr><td>" . 'SURNAME NAME : ' . "</td><td>$row[boo_lname] </td></tr>";
echo "<tr><td>" . 'TELEPHONE : ' . "</td><td>$row[boo_tel] </td></tr>";
echo "<tr><td>" . 'EMAIL : ' . "</td><td>$row[boo_email] </td></tr>";
echo "<tr><td>" . 'FROM : ' . "</td><td>$row[boo_bfrom] </td></tr>";
echo "<tr><td>" . 'TO : ' . "</td><td>$row[boo_tob] </td></tr>";
echo "<tr><td>" . 'ADULT GUESTS : ' . "</td><td>$row[boo_guestsadult] </td></tr>";
echo "<tr><td>" . 'KIDS : ' . "</td><td>$row[boo_guestskids] </td></tr>";
echo "<tr><td>" . 'PETS : ' . "</td><td>$row[boo_pets] </td></tr>";
echo "<tr><td>" . 'CARS : ' . "</td><td>$row[boo_cars] </td></tr>";
echo "<tr><td>" . 'MEALS : ' . "</td><td>$row[boo_meals] </td></tr>";
echo "<tr><td>" . 'RATE : ' . "</td><td>$row[boo_rate] </td></tr>";
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";
echo "<tr><td>" . 'SPECIAL INSTRUCTIONS : ' . "</td><td>$row[boo_spinstruct] </td></tr>";
echo "<tr><td>" . 'ACCOMMODATION ALLOCATION : ' . "</td><td>$row[boo_acname] </td></tr>";
$allocate = $row[boo_accallocat]; } 


echo "</table><br />"; 


echo "<center><h2>EDIT BOOKING <h2>
<form name='rform' onsubmit='return validateForm();' action='edprocessboo.php' method='post'>
<label>First Name</label><input type='text' name='fname' value='$fname'/><br />
<label>Surname</label><input type='text' name='sname' value='$sname' /><br />
<label>Telephone</label><input type='text' name='tel' value='$tel' /><br />
<label>Email</label><input type='text' name='email' value='$email'/><br />

<label>From $bfrom</label><input type='date' name='dfrom'><br />
<label>To $tob</label><input type='date' name='dto'><br />
<label>Number of Guests Adult $adult</label>
<select name='guestadult' />
<option value='0' >0</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='5' >5</option>
<option value='6' >6</option>
<option value='7' >7</option>
<option value='8' >8</option>
<option value='9' >9</option>
<option value='10' >10</option>

</select><br />
<label>Number of Guests Kids $kids</label>
<select name='guestkid' />
<option value='0' >0</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='5' >5</option>
<option value='6' >6</option>
<option value='7' >7</option>
<option value='8' >8</option>
<option value='9' >9</option>
<option value='10' >10</option>
</select><br />
<label>Pets $pets</label>
<select name='pets' />
<option value='0' >0</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='5' >5</option>
<option value='6' >6</option>
<option value='7' >7</option>
<option value='8' >8</option>
<option value='9' >9</option>
<option value='10' >10</option>
</select><br />
<label>Cars $cars</label>
<select name='cars' />
<option value='0' >0</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='5' >5</option>
<option value='6' >6</option>
<option value='7' >7</option>
<option value='8' >8</option>
<option value='9' >9</option>
<option value='10' >10</option>
</select><br />
<label>Meals $meals</label>
<select name='meals' />
<option value='none' >None</option>
<option value='breakfast' >Breakfast</option>
<option value='dinner' >Dinner</option>
<option value='DBB' >DBB</option>
</select><br />
<label>Rate $rate</label>
<input type='text' value='$rate' name='rate' /><br />
<label>Status $status</label><select name='status'>
<option value='enquiry'>Enquiry</option>
<option value='provisional'>Provisional Booking</option>
<option value='booking'>Booking</option>
<option value='deposit'>Deposit</option>
<option value='paidif'>Paid In Full</option>
<option value='occupied'>Occupied</option>
</select><br />
<label>Special Instructions</label>
<textarea name='spinstruct' cols='20' rows='20'>$sp</textarea><br />
<label>Accommodation Allocation $ac</label>
<select name='accommallocate'>";

$q = $db->query("SELECT * FROM accomm1");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo "<option value='$ro[ac_id]'>$ro[ac_name] </option>";

} 




echo "</select><br />";
echo"<label>Discount Type 1 </label>
<select name='discount'>
<option value='0'>0</option>";


$qd = $db->query("SELECT * FROM discount");
while($rod = $qd->fetchArray(SQLITE3_ASSOC) ) { 

echo "<option value='$rod[dis_id]'>$rod[dis_name] $rod[dis_amount]</option>";

} 


echo "</select><br />
<label>Number of Guests for Discount</label>
<select name='disguests' />
<option value='0' >0</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='5' >5</option>
<option value='6' >6</option>
<option value='7' >7</option>
<option value='8' >8</option>
<option value='9' >9</option>
<option value='10' >10</option>
</select><br />
<label>Discount Type 2 </label>
<select name='discount1'>
<option value='0'>0</option>";


$qd = $db->query("SELECT * FROM discount");
while($rod = $qd->fetchArray(SQLITE3_ASSOC) ) { 

echo "<option value='$rod[dis_id]'>$rod[dis_name] $rod[dis_amount]</option>";

} 


echo "</select><br />
<label>Number of Guests for Discount 2</label>
<select name='disguests1' />
<option value='0' >0</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='5' >5</option>
<option value='6' >6</option>
<option value='7' >7</option>
<option value='8' >8</option>
<option value='9' >9</option>
<option value='10' >10</option>
</select><br />";
echo "<label>Booking Type</label>
<select name='bootype' />
<option value='sng'>Single</option>
<option value='multip'>Multi</option>

</select><br />
<label>If Muit Select If inclusive or Exclusive for Added Costs</label>
<select name='multitype' />
<option value='inc'>Inclusive</option>
<option value='exc'>Exclusive</option>

</select><br />";
echo "<input type='text' name='id' value='$id'/>
<input type='submit' name='submit' value='submit' /></form></div>";
?>

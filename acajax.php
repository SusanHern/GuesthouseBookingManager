<?php
include "bsl3.php";
$id = $_REQUEST[id];
echo "<div id='mab'>";
$q = $db->query("SELECT atc_name, atc_price, atc_singlesupp, atc_id, accomm1.ac_name, accomm1.ac_facilities, accomm1.ac_capacity FROM accommtype JOIN accomm1 ON accommtype.atc_id = accomm1.ac_type WHERE accomm1.ac_id = '$id'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 
$rate = $ro[atc_price];
echo 'NAME : ' . "$ro[ac_name] <br />";
echo 'CAPACITY : ' . "$ro[ac_capacity] <br />";
echo 'Rate Type : ' . "$ro[atc_price]<br />";
echo 'Type NAME : ' . "$ro[atc_name]<br />";
echo 'Type SINGLE SUPLEMENT: ' . "$ro[atc_singlesupp]<br />";
echo "<div id='Descp'>" . 'FACILITIES : ' . "$ro[ac_facilities] </div><br />";

} 
echo "<h2>BOOKING FORM<h2>
<form name='boo' action='processboo.php' method='post'>
<label>First Name</label><input type='text' name='fname' /><br />
<label>Surname</label><input type='text' name='sname' /><br />
<label>Telephone</label><input type='text' name='tel' /><br />
<label>Email</label><input type='text' name='email' /><br />
<label>From</label><input type='date' name='dfrom'><br />
<label>To</label><input type='date' name='dto'><br />
<label>Number of Guests Adult</label>
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
<label>Number of Guests Kids</label>
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
<label>Pets</label>
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
<label>Cars</label>
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
<label>Meals</label>
<select name='meals' />
<option value='none' >None</option>
<option value='breakfast' >Breakfast</option>
<option value='dinner' >Dinner</option>
<option value='DBB' >DBB</option>
</select><br />
<label>Rate Per Adult Sharing</label>
<input type='text' value='$rate' name='rate' /><br />
<label>Status</label><select name='status'>
<option value='enquiry'>Enquiry</option>
<option value='provisional'>Provisional Booking</option>
<option value='booking'>Booking</option>
<option value='deposit'>Deposit</option>
<option value='paidif'>Paid In Full</option>
</select><br />
<label>Special Instructions</label>
<textarea name='spinstruct' cols='20' rows='20'></textarea><br />
<label>Accommodation Allocation</label>
<input type='text' name='accommallocate' value='$id'>
<label>Discount Type 1 </label>
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

echo "<option  value='$rod[dis_id]'>$rod[dis_name] $rod[dis_amount]</option>";

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
</select><br />
<label>Booking Type</label>
<select name='bootype' />
<option value='sng'>Single</option>
<option value='multip'>Multi</option>

</select><br />
<label>If Muit Select If inclusive or Exclusive for Added Costs</label>
<select name='multitype' />
<option value='inc'>Inclusive</option>
<option value='exc'>Exclusive</option>

</select><br />
<input type='submit' name='submit' value='submit' /></form></div>";
?>

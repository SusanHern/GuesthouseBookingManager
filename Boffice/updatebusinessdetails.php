<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php";


$sq = $db->query("SELECT * from businessdetails");

while($ro = $sq->fetchArray(SQLITE3_ASSOC) )  { 
$busid = $ro[bus_id];
$rname = ($ro[bus_name]);
$rtype = ($ro[bus_type]);

$rsno = $ro[bus_streetno];
$rsname = ($ro[bus_streetname]);
$rssub = ($ro[bus_suburb]);
$rprov = ($ro[bus_province]);
$rcountry = ($ro[bus_country]);
$rphone = $ro[bus_phone];
$remail = ($ro[bus_email]);
$rpostalcode = $ro[postalcode];
$rcity = $ro[bus_city];
$mobile = $ro[bus_mobilephone];
$fax = $ro[bus_fax_number];

} 

if(!isset($_POST["submit"]) ) { 
echo "<form action='$_SERVER[PHP_SELF]' method='post'>"; 
echo "<h1 id='conths'>Business Details</h1><p>These details will appear on invoices and emails.</p>";
echo "<b>Name of Establishment</b><br />";
echo "<input type='text' value='$rname' name='bus_name'/><br />";
echo "<b>Type Establishment</b><br />";
echo "<input type='text' value='$rtype' name='bus_type'/><br />";

echo "<b>Street Number of Establishment</b><br />";
echo "<input type='text' value='$rsno' name='bus_streetno' /><br />";
echo "<b>Street Name of Establishment</b><br />";
echo "<input type='text' value='$rsname' name='bus_streetname' /><br />";
echo "<b>Suburb of Establishment</b><br />";
echo "<input type='text' value='$rssub' name='bus_suburb' /><br />";
echo "<b>Province of Establishment</b><br />";
echo "<input type='text' value='$rprov' name='bus_province' /><br />";
echo "<b>Country of Establishment</b><br />";
echo "<input type='text' value='$rcountry' name='bus_country' /><br />";
echo "<b>Landline of Establishment</b><br />";
echo "<input type='text' value='$rphone' name='bus_phone' /><br />";
echo "<b>Email of Establishment</b><br />";
echo "<input type='text' value='$remail' name='bus_email' /><br />";

echo "<b>Postalcode of Establishment</b><br />";
echo "<input type='text' value='$rpostalcode' name='bus_postalcode' /><br />";
echo "<b>City of Establishment</b><br />";
echo "<input type='text' value='$rcity' name='bus_city' /><br />";

echo "<label>Business Mobile</label><br />";
echo "<input type='text' name='bus_mobilephone' value='$mobile'/><br />";

echo "<label>Business Fax Number</label><br />";
echo "<input type='text' name='bus_fax_number' value='$fax' /><br />";
echo "<input type='text' name='busid' value='$busid' /><br />";
echo "<input type='submit' value='submit' name='submit' />";
echo "</form>";

 } 
else { 

if(EMPTY($_POST['bus_name']) ) { 
echo "Business name must be filled out"; } 
elseif(EMPTY($_POST['bus_type'] ) ) { 
echo "Business type must be filled out"; } 
elseif(EMPTY($_POST['bus_streetname'] ) ) { 
echo "Business streetname must be filled out"; } 
elseif(EMPTY($_POST['bus_suburb'] ) ) { 
echo "Business suburb must be filled out"; } 
elseif(EMPTY($_POST['bus_province'] ) ) { 
echo "Business province must be filled out"; } 
elseif(EMPTY($_POST['bus_phone'] ) ) { 
echo "Business phone must be filled out"; } 
elseif(!EMPTY($_POST['bus_name'] ) && !EMPTY($_POST['bus_type'] ) && !EMPTY($_POST['bus_streetname'] ) && !EMPTY($_POST['bus_suburb'] ) && !EMPTY($_POST['bus_phone'] )) { 
$busid = intval($_POST[busid]);
$bus_name = (cl($_POST['bus_name']));
$bus_type =  (cl($_POST['bus_type']));

$bus_streetno =  ($_POST['bus_streetno']);
$bus_streetname =  (cl($_POST['bus_streetname']));
$bus_bldno =  cl($_POST['bus_bldno']);
$bus_bldname =  cl($_POST['bus_bldname']);
$bus_suburb =  (cl($_POST['bus_suburb']));
$bus_province =  (cl($_POST['bus_province']));
$bus_city =  cl($_POST['bus_city']);
$bus_country =  cl($_POST['bus_country']);
$bus_phone =  (cl($_POST['bus_phone']));
$bus_email =  ($_POST['bus_email']);
$postalcode =  ($_POST['bus_postalcode']);
$bus_mobile =  (cl($_POST['bus_mobilephone']));
$bus_fax_number =  (cl($_POST['bus_fax_number']));

echo "postal code $postalcode";
$mqs4 = $db->query("UPDATE businessdetails SET bus_name = '$bus_name', bus_type = '$bus_type', bus_streetno = '$bus_streetno', bus_streetname = '$bus_streetname', bus_bldno = '$bus_bldno', bus_bldname = '$bus_bldname', bus_suburb = '$bus_suburb', bus_province = '$bus_province', bus_city = '$bus_city', bus_country = '$bus_country', bus_phone = '$bus_phone', bus_email = '$bus_email', postalcode = '$postalcode', bus_mobilephone = '$bus_mobile', bus_fax_number = '$bus_fax_number' WHERE bus_id = '$busid'");
} 
} } else { 
echo "goodness"; } 
?>
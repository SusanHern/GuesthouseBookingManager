<?php
session_start();

if(isset($_SESSION[us]) ) { 



include "bsl3.php";
$ret = $db->query("SELECT * from businessdetails");
while($ro = $ret->fetchArray(SQLITE3_ASSOC ) )  { 
$bus_id = ($ro[bus_id]); } 
if($bus_id >  0) { 
echo "You have already completed this process"; } else { 
echo "<div id='mab'>";
if(!isset($_POST["submit"]) ) { 
echo "<form action='$_SERVER[PHP_SELF]' name='mform' method='post'>"; 
echo "<h1 id='conths'>Business Details</h1><p>These details will appear on the printout and emails.</p>";
echo "<label>Business Name</label><br />";
echo "<input type='text' name='bus_name' /><br />";

echo "<label>Business Type</label><br />";
echo "<input type='text' name='bus_type' /><br />";




echo "<label>Business Street Number</label><br />";
echo "<input type='text' name='bus_streetno' /><br />";

echo "<label>Business Street Name</label><br />";
echo "<input type='text' name='bus_streetname' /><br />";
echo "<label>Business Building Number</label><br />";
echo "<input type='text' name='bus_bldno' /><br />";

echo "<label>Business Building Name</label><br />";
echo "<input type='text' name='bus_bldname' /><br />";

echo "<label>Business Suburb</label><br />";
echo "<input type='text' name='bus_suburb' /><br />";

echo "<label>Postal Code</label><br />";
echo "<input type='text' name='postalcode' /><br />";
echo "<label>Business State</label><br />";
echo "<input type='text' name='bus_province' /><br />";

echo "<label>Business City</label><br />";
echo "<input type='text' name='bus_city' /><br />";

echo "<label>Business Country</label><br />";
echo "<input type='text' name='bus_country' /><br />";

echo "<label>Business Landline</label><br />";
echo "<input type='text' name='bus_phone' /><br />";

echo "<label>Business Mobile</label><br />";
echo "<input type='text' name='bus_mobilephone' /><br />";
echo "<label>Business Email</label><br />";
echo "<input type='text' name='bus_email' /><br />";
echo "<label>Business Fax Number</label><br />";
echo "<input type='text' name='bus_fax_number' /><br />";

echo "<input type='submit' id='submit' name='submit' value='Add Details' /></form><br />";}  
else 
{  
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
$postalcode =  ($_POST['postalcode']);
$bus_mobile =  (cl($_POST['bus_mobile']));
$bus_fax_number =  (cl($_POST['bus_fax_number']));
$cust_em_idbs =  ($_POST['cust']);

$mqs4 = $db->exec("INSERT INTO businessdetails (bus_name, bus_type, bus_streetno, bus_streetname, bus_bldno, bus_bldname, bus_suburb, bus_province, bus_city, bus_country, bus_phone, bus_email, postalcode, bus_mobilephone, cust_em_idbs, bus_fax_number) VALUES('$bus_name', '$bus_type', '$bus_streetno', '$bus_streetname', '$bus_bldno', '$bus_bldname', '$bus_suburb', '$bus_province', '$bus_city', '$bus_country', '$bus_phone', '$bus_email', '$postalcode', '$bus_mobile', '$cust_em_idbs', '$bus_fax_number')");



 } } } } else { } 


?></div>
 <script>
function validateForm()
{
var x=document.forms["mform"]["bus_name"].value;
if (x==null || x=="")
  {
  alert("Title must be filled out");
  return false;
  } 


var xc=document.forms["mform"]["bus_type"].value;
if (xc==null || xc=="")
  {
  alert("Type must be supplied");
  return false;
  } 
var xc=document.forms["mform"]["bus_city"].value;
if (xc==null || xc=="")
  {
  alert("City must be supplied");
  return false;
  } } 
</script>
<!DOCTYPE HTML><html><head><title>Email Quote</title>
<style>
@import url(http://fonts.googleapis.com/css?family=Lobster);
body {
  text-align: center;
background: #E8E8E8 ;
font-size: 20px;
} 
#co{
padding:5px;
font-family: 'Lobster', sans-serif;
font-size: 2.75em;
font-size:40px;
Background: silver;
Border: 1px solid silver;
text-align: center;
border-top-left-radius: 2em 0.5em;
border-top-right-radius: 2em 0.5em;
border-bottom-right-radius: 0em;
border-bottom-left-radius: 0em;}
#mab{
float:left;
background:white;
margin-left: 200px;}
.itco:hover{
 border:1px solid #93cdf7;
border-radius:30%;
 background-color: #c3e3fa; background-image: -webkit-gradient(linear, left top, left bottom, from(#c3e3fa), to(#a5defb));
 background-image: -webkit-linear-gradient(top, #c3e3fa, #a5defb);
 background-image: -moz-linear-gradient(top, #c3e3fa, #a5defb);
 background-image: -ms-linear-gradient(top, #c3e3fa, #a5defb);
 background-image: -o-linear-gradient(top, #c3e3fa, #a5defb);
 background-image: linear-gradient(to bottom, #c3e3fa, #a5defb);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#c3e3fa, endColorstr=#a5defb);
}

table{background:black;
color:white;
font-size: 18px;} 
#tt{border: solid #C9C9C9 1px;
border-radius: 10%;
padding:5px;
width:150px;
font-size:24px;
text-align:center;
background: #FFFFFF url('bg_form.png') left top repeat-x; 
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF)); 
    background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px); 
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
}

a{ color: gray;
text-decoration: none; } 
</style></head><body>
<?php
include "bsl3.php";
if(isset($_POST[name] ) ) { 
$ref = $_POST[payref];
$name = $_POST[name];
$address = $_POST[address];
$phone = $_POST[phone];
$mobile = $_POST[mobile];
$acname = $_POST[acname];
$guest = $_POST[guestname];
$numofguests = $_POST[numofguests];
$from = $_POST[bfrom];
$to = $_POST[tob];
$length = $_POST[numdays];
$additions = $_POST[sum];
$totnoad = $_POST[total];
$grandtotal = $_POST[grandtotal];
$notes = $_POST[notes];
$guestemail = $_POST[guestemail];
$image = $_POST[image];
$link1 = $_POST[link1];
$link2 = $_POST[link2];
$link3 = $_POST[link3];
$link4 = $_POST[link4];
$linkname1 = $_POST[linkname1];
$linkname2 = $_POST[linkname2];
$linkname4 = $_POST[linkname4];
$salestax = $_POST[salestax];
$emai = $_POST[emai];
$fil = file_get_contents("hj.txt");
$unq = $fil;
echo "$unq<br />";
echo "<iframe src='http://itsasmartsolve.co.za/sendem9.php?payref=$ref&&name=$name&&address=$address&&phone=$phone&&mobile=$mobile&&acname=$acname&&guestname=$guest&&numofguests=$numofguests&&bfrom=$from&&tob=$to&&numdays=$length&&sum=$additions&&total=$totnoad&&grandtotal=$grandtotal&&notes=$notes&&guestemail=$guestemail&&image=$image&&link1=$link1&&link2=$link2&&link3=$link3&&link4=$link4&&emai=$emai&&linkname1=$linkname1&&linkname2=$linkname2&&linkname4=$linkname4&&salestax=$salestax&&unq=$unq'></iframe>";
echo "emai $emai<br />"; }
?>
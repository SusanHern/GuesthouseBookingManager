<?php


include "bsl3.php";



$sql =<<<EOF
      SELECT * from businessdetails;
EOF;
$ret = $db->query($sql);
while($ro = $ret->fetchArray(SQLITE3_ASSOC ) )  { 
$na = ($ro[bus_name]);
$ty = ($ro[bus_type]);
$stno = $ro[bus_streetno];

$stna = ($ro[bus_streetname]);
$subr = ($ro[bus_suburb]);
$prov = ($ro[bus_province]);
$bldna = ($ro[bus_bldname]);
$em = ($ro[bus_email]);
$mobile = ($ro[bus_mobilephone]);
echo "Owner " . $na . "<br /> ";
echo "Name of Establishment " . $ty . "<br /> ";

echo "Street Number " . $ro[5] . "<br /> ";
echo "Street Name " . $stna . "<br /> ";
echo "Suburb " . $subr . "<br /> ";
echo "Province" . $prov . "<br /> ";
echo "City " . $ro[bus_city] . "<br /> ";
echo "Country " . $ro[bus_country] . "<br /> ";
echo "Phone " . nummr($ro[bus_phone]) . "<br /> ";
echo "Postalcode " . $ro[postalcode] . "<br /> ";
echo "<a href='updatebusinessdetails.php?id=$ro[0]'>Edit Details</a>";

}  
?>
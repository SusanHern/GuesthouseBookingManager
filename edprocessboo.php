<?php
include "bsl3.php";

if(isset($_POST[submit]) ) { 
$id = $_POST[id];
$fname = cl($_POST['fname']);
$sname = cl($_POST['sname']);
$tel = $_POST['tel'];
$email = $_POST['email'];
$dfrom = $_POST['dfrom'];
$dto = $_POST['dto'];
$guestadult = $_POST['guestadult'];
$guestkid = $_POST['guestkid'];
$pets = $_POST['pets'];
$cars = $_POST['cars'];
$meals = $_POST['meals'];
$rate = $_POST['rate'];
$status = $_POST['status'];
$accommallocate = $_POST['accommallocate'];
$discount = $_POST['discount'];
$disguests = $_POST['disguests'];
$discount1 = $_POST['discount1'];
$disguests1 = $_POST['disguests1'];
$multitype = $_POST['multitype'];
$bootype = $_POST['bootyoe'];
     if (empty($_POST['fname'])) {
            echo  "Please supply a name";
        } elseif (empty($_POST['sname'])) {
            echo "you must supply a surname";
        } elseif (empty($_POST['tel'])) {
            echo "Please supply a telephone number";
        } elseif(empty($_POST['email']) ) {
 echo "Client email must be supplied"; } 
        elseif(empty($_POST['rate']) ) {
 echo "Room rate must be supplied"; }
else { 

echo "<div id='mab'><table cellspacing=0 cellpadding=4 width=400px>";
$q = $db->query("SELECT * FROM accomm1 WHERE ac_id = '$accommallocate'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 
$ac_name = "$ro[ac_name]";
echo "<tr><td>". 'NAME : ' . "</td><td>$ro[ac_name] </td></tr>";
echo "<tr><td>" . 'CAPACITY : ' . "</td><td>$ro[ac_capacity] </td></tr>";
echo "<tr><td><div id='Descp'>" . 'FACILITIES : ' . "</td><td>$ro[ac_facilities] </div></td></tr>";
} 
echo "</table>";
$spinstruct = cl($_POST['spinstruct']);
echo 'FIRST NAME : ' . "$fname <br />";
echo 'SURNAME NAME : ' . "$sname <br />";
echo 'TELEPHONE : ' . "$tel <br />";
echo 'EMAIL : ' . "$email <br />";
echo 'FROM : ' . "$dfrom <br />";
echo 'TO : ' . "$dto <br />";
echo 'ADULT GUESTS : ' . "$guestadult <br />";
echo 'KIDS : ' . "$guestkid <br />";
echo 'PETS : ' . "$pets <br />";
echo 'CARS : ' . "$cars <br />";
echo 'MEALS : ' . "$meals <br />";
echo 'RATE : ' . "$rate <br />";
echo 'STATUS : ' . "$status <br />";
echo 'SPECIAL INSTRUCTIONS : ' . "$spinstruct <br />";
echo 'ACCOMMODATION ALLOCATION : ' . "$accommallocate <br />";


$qd = $db->query("SELECT * FROM discount WHERE dis_id = '$discount'");
while($rod = $qd->fetchArray(SQLITE3_ASSOC) ) { 
$disname = $rod[dis_name];
$disamount = $rod[dis_amount];

} 
$qd1 = $db->query("SELECT * FROM discount WHERE dis_id = '$discount1'");
while($rod1 = $qd1->fetchArray(SQLITE3_ASSOC) ) { 
$disname1 = $rod1[dis_name];
$disamount1 = $rod1[dis_amount];

} 

$q = $db->query("UPDATE booking SET boo_fname = '$fname', boo_lname = '$sname', boo_tel = '$tel', boo_email = '$email', boo_guestsadult = '$guestadult', boo_guestskids = '$guestkid', boo_status = '$status', boo_bfrom = '$dfrom', boo_tob = '$dto', boo_spinstruct = '$spinstruct', boo_meals = '$meals', boo_cars = '$cars', boo_pets = '$pets', boo_rate = '$rate', boo_accallocat = '$accommallocate', boo_acname = '$ac_name', boo_discountname = '$disname', boo_discountamount = '$disamount', boo_discountguests = '$disguests', boo_discountid = '$discount', boo_discountname1 = '$disname1', boo_discountamount1 = '$disamount1', boo_discountguests1 = '$disguests1', boo_discountid1 = '$discount1', boo_type = '$bootype', boo_multitype = '$multitype' WHERE boo_id = '$id'");
echo "</div>"; } } 
?>
boo_type, boo_multitype


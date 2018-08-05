<?php
include "bsl3.php";

        if (empty($_POST['fname'])) {
            echo  "Please supply a name";
        } elseif (empty($_POST['sname'])) {
            echo "you must supply a surname";
        } elseif (empty($_POST['tel']) ) {
            echo "Please supply a telephone number";
        } elseif(empty($_POST['email']))  {
 echo "Client email must be supplied"; } 
        elseif(empty($_POST['rate']) )  {
 echo "Room rate must be supplied"; }
else { 
$multitype = $_POST[multitype];
echo "$multitype<br />";
$bootype = $_POST[bootype];
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
$todaynow = date("Y-m-d");
$numvarray = array('aa' , 'cc' , 'mj' , 'zq' , 'tt' , 'dy');
$numvarray1 = range(1, 12, 1);
shuffle($numvarray);
shuffle($numvarray1);
$ref1 = $numvarray[0];
$ref2 = $numvarray1[0];
$q = $db->query("SELECT * FROM numref ORDER BY num_id DESC LIMIT 1"); 
while($ronum = $q->fetchArray(SQLITE3_ASSOC) ) { 
$numtu = $ronum[num_va];

} 
$ref3 = $ref2 . $ref1 . $numtu;
echo "ref $ref3";
$newnum = $numtu + 1;
$qs = $db->query("UPDATE numref SET num_va = '$newnum' WHERE num_id = '1'");
$q = $db->query("INSERT INTO booking(boo_fname, boo_lname, boo_tel, boo_email, boo_guestsadult, boo_guestskids, boo_status, boo_bfrom, boo_tob, boo_spinstruct, boo_meals, boo_cars, boo_pets, boo_rate, boo_accallocat, boo_acname, boo_discountname, boo_discountamount, boo_discountguests, boo_discountid, boo_discountname1, boo_discountamount1, boo_discountguests1, boo_discountid1, boo_gref, boo_type, boo_sdate, boo_multitype) VALUES('$fname', '$sname', '$tel', '$email', '$guestadult', '$guestkid', '$status', '$dfrom', '$dto', '$spinstruct', '$meals', '$cars', '$pets', '$rate', '$accommallocate', '$ac_name', '$disname', '$disamount', '$disguests', '$discount', '$disname1', '$disamount1', '$disguests1', '$discount1', '$ref3', '$bootype', '$todaynow', '$multitype')");
echo "</div>"; } 
?>


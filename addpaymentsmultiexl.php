<style>
th{
padding:5px;
font-family: Arial Rounded MT Bold,Helvetica Rounded,Arial,sans-serif; 
font-size:40px;
color:white;
Background: navy;
Border: 1px solid navy;
 text-align: center;
border-top-left-radius: 2em 0.5em;
border-top-right-radius: 2em 0.5em;
border-bottom-right-radius: 0em;
border-bottom-left-radius: 0em;}
tr{border-radius:15%;}
td{background: white;
 text-align: center;
color:navy;
border-bottom:1px dotted navy;
border-left: 1px solid navy;
padding:4px;
font-family: Verdana,Geneva,sans-serif; 

}
table{border-radius:15%;
margin-bottom:25px;
border-bottom: 2px solid navy;}
</style>
<?php
include "bsl3.php";
$na = trim($_REQUEST[id]);
echo "naaa $na";
echo "na $na<br />";
$qpa = $db->query("SELECT * FROM booking WHERE boo_multiaddedid = '$na'");
while($ropa = $qpa->fetchArray(SQLITE3_ASSOC) ) 
{ 
echo "<table cellspacing='0' cellpadding='5'>";

echo "<tr><td>$ropa[boo_lname]</td><tr>";
$multitype = $ropa[boo_multitype];
echo "<tr><td>$multitype</td></tr>";
echo "<tr><td>$ropa[boo_acname]</td></tr>";
echo "<tr><td><a href='addpaymentsmulti.php?na=$ropa[boo_id]'>Add to payment $multitype Bill</a></td></tr>"; 
echo "</table>";
} 
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
$q = $db->query("SELECT * FROM booking WHERE boo_type != 'multi' AND boo_status != 'COMPLETED' ORDER BY boo_lname");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' cellpadding='5'>";
$len = strlen($row[boo_type]);

echo "<tr><td>" . ' NAME : ' . "</td><td>$row[boo_fname] " . ' ' . "$row[boo_lname]</td><td><a href='viewbooking.php?id=$row[boo_id]'><img src='view.png' width='50px' /></a></td></tr>";

 } 


$q = $db->query("SELECT * FROM accomm1 WHERE ac_id = '$row[boo_accallocat]'");
while($ro = $q->fetchArray(SQLITE3_ASSOC) ) { 

echo "<tr><td>". 'ACCOMMODATION ALLOCATION : ' . "</td><td>$ro[ac_name] </td><td><a href='viewaccomm.php?id=$row[ac_id]'>View Details</a></td></tr>";
echo "</table>";

} 
 
echo "</center>";
?> 
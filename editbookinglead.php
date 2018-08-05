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
$q = $db->query("SELECT * FROM booking WHERE boo_status != 'COMPLETED' AND boo_type != 'multi' ORDER BY boo_lname");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "<table cellspacing='0' cellpadding='5'>";
echo "<tr><td>" . ' NAME : ' . "</td><td>$row[boo_fname] " . ' ' . "$row[boo_lname]</td></tr>"; 
$allocate = $row[boo_accallocat]; 
echo "<tr><td>" . 'STATUS : ' . "</td><td>$row[boo_status] </td></tr>";

echo "<tr><td><a href='editbooking.php?boid=$row[boo_id]'><img src='edit.png' width='50px' /></a></td><td><a href='deletebookinglead.php?boid=$row[boo_id]'><img src='cancel.png' width='50px' /></a></td></tr>";

echo "<tr><td>". 'ACCOMMODATION ALLOCATION : ' . "</td><td>$row[boo_acname] </td></tr>";
echo "</table>";




 } 
echo "</center>";
?> 
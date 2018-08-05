<style>
th{
padding:5px;
	font-family: Arial Rounded MT Bold,Helvetica Rounded,Arial,sans-serif; 
font-size:40px;
color:white;
Background: navy;
Border: 1px solid silver;
  text-align: center;
border-top-left-radius: 2em 0.5em;
border-top-right-radius: 2em 0.5em;
border-bottom-right-radius: 0em;
border-bottom-left-radius: 0em;}
tr{border-radius:15%;}
td{background: #e8effc;
color:navy;
border-bottom:1px dotted navy;
border-left: 1px solid navy;
padding:4px;
font-family: Verdana,Geneva,sans-serif; 

}
table{border-radius:15%;}
</style>
<?php
include "bsl3.php";
$na = $_REQUEST[id];
echo "$na";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$na'");
while($row = $q->fetchArray(SQLITE3_ASSOC)) { 
echo "$row[boo_lname]<br />";
echo "$row[boo_acname]<br />";
echo "$row[boo_id]<br />";
echo "<form name='subguests' action='prsubguests.php' method='post'><b>Guest Names comma seperated</b><br />
<textarea rows='20' cols='20' name='guests'></textarea><br /><b>Phone Numbers, comma separated</b><br /><textarea name='phnum' rows='20' cols='20'></textarea><br /><input type='text' name='id' value='$na' /><br /><input type='submit' name='submit' value='submit' /></form><br />";
} 
?> 

<?php
include "bsl3.php";
if(isset($_POST[submit]) ) { 


$name = cl($_POST['name']);
$capacity = $_POST['capacity'];
$facilities = cl($_POST['facilities']);
$id = $_POST[id];
echo "<div id='mab'>";
echo 'NAME : ' . "$name <br />";
echo 'CAPACITY : ' . "$capacity <br />";
echo 'FACILITIES : ' . "$facilities <br />";
$sql = $db->query("UPDATE accomm1 SET ac_name = '$name', ac_capacity = '$capacity', ac_facilities = '$facilities' WHERE ac_id = '$id'");
echo "</div>"; } 
?> 

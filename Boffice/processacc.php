
<?php
include "bsl3.php";
if(isset($_POST[submit]) ) { 


$name = cl($_POST['name']);
$capacity = $_POST['capacity'];
$facilities = cl($_POST['facilities']);
$type = $_POST[type];
echo "<div id='mab'>";
echo 'NAME : ' . "$name <br />";
echo 'CAPACITY : ' . "$capacity <br />";
echo 'FACILITIES : ' . "$facilities <br />";
$sql = $db->query("INSERT INTO accomm1(ac_name, ac_capacity, ac_facilities, ac_type) VALUES('$name', '$capacity', '$facilities', '$type')");
echo "</div>"; } 
?>
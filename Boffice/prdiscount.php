<?php
session_start();

if(isset($_SESSION[us]) ) { 

include "bsl3.php"; 
if(isset($_POST[submit]) ) { 


$dis_name = $_POST['dis_name'];
$dis_amount = $_POST['dis_amount'];

$dis_desc = $_POST['dis_desc'];
echo "<div id='mab'>$dis_name<br />";

$sq = $db->exec("INSERT INTO discount (dis_name, dis_amount, dis_descp) VALUES ('$dis_name', '$dis_amount', '$dis_desc')");

echo "</div>"; } } else { echo "goodness"; } 


?>

  	  	
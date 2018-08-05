
<?
include "bsl3.php";
if(isset($_POST[submit]) ) { 


$id = $_POST[id];
$ta_name = $_POST['ta_name'];
$ta_amount = $_POST['ta_amount'];
$ta_currsymbol = $_POST['ta_currsymbol'];
$ta_currname = $_POST['ta_currname'];
$ta_type = $_POST['ta_type'];
$ta_desco = $_POST['ta_desc'];
echo "<div id='mab'>$ta_name<br />";

$sq = $db->query("UPDATE salestaxtb SET ta_name = '$ta_name', ta_amount = '$ta_amount', ta_currsymbol = '$ta_currsymbol', ta_currname = '$ta_currname', ta_type = '$ta_type', ta_descp = '$ta_desco' WHERE ta_id = '$id'");

echo "</div>"; } 


?>

  	  	
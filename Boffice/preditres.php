<?php
include "bsl3.php";
if(isset($_POST[submit]) ) { 
$image = $_POST[image];
$link1 = $_POST[link1];
$link2 = $_POST[link2];
$link3 = $_POST[link3];
$link4 = $_POST[link4];
$linkname1 = $_POST[linkname1];
$linkname2 = $_POST[linkname2];
$linkname4 = $_POST[linkname4];
$emai = $_POST[emai];
$id = $_POST[id];
$q = $db->query("UPDATE resourcesem SET re_image = '$image', re_link1 = '$link1', re_link2 = '$link2', re_link3 = '$link3', re_link4 = '$link4', re_emai = '$emai', res_linkname1 = '$linkname1', res_linkname2 = '$linkname2', res_linkname4 = '$linkname4' WHERE re_id = '$id'"); } else { 
echo " "; } 
?>

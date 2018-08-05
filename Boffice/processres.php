<?php
include "bsl3.php";
if(isset($_POST[submit]) ) { 
$image = $_POST[image];
$link1 = $_POST[link1];
$link2 = $_POST[link2];
$link3 = $_POST[link3];
$link4 = $_POST[link4];
$emai = $_POST[emai];
$q = $db->query("INSERT INTO resourcesem(re_image, re_link1, re_link2, re_link3, re_link4, re_emai)VALUES('$image', '$link1', '$link2', '$link3', '$link4', '$emai')"); } else { 
echo " "; } 
?>

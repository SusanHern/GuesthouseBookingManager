<?php
include "bsl3.php";
$guests = $_POST[guests];
$phnums = $_POST[phnum];
$id = $_POST[id];
echo "$guests $phnum $id<br />";
$q = $db->query("UPDATE booking SET boo_subguestname = '$guests', boo_subguesttel = '$phnums' WHERE boo_id = '$id'");
?>
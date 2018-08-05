<?php

include "bsl3.php";
$id = $_POST[id];
$status = $_POST[status];
echo "$id $status";
$q = $db->query("UPDATE booking SET boo_status = '$status' WHERE boo_multiaddedid = '$id'");
?>
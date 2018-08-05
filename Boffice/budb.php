<?php
include "bsl3.php";

$file = "../hj.txt";
$unq = file_get_contents($file);
echo "<center><form enctype='multipart/form-data' name='mform' onsubmit='return validateForm();' action='http://itsasmartsolve.co.za/addm.php' method='post' >";
echo "<b>Username</b><br />";
echo "<input type='text' name='us' /><br />";
echo "<b>Password</b><br />";
echo "<input type='password' name='ps' /><br />";
echo "<input type='hidden' value='$unq' name='unq' /><br />";
echo "<br /><input type='hidden' name='MAX_FILE_SIZE' value='300000000000000000' /><br />";
echo "<b>Add product picture Select File ( only jpg,gif,png allowed)</b><input type='file' name='autfile' /><br />";

echo "<input type='submit' name='submit' value='submit' /></form>";
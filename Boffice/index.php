<?php
session_start();

if(isset($_SESSION[us]) ) { 
include "bsl3.php"; } else { 
echo "<a href='../index.php'>You must be logged in. go back</a>"; } 

?>
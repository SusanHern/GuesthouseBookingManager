<?php
$rescount = $records;
$recordsperpage = 6;
$pages = ceil($rescount/6);

if(!$_GET[nu]) {  
$nu = 0; } 
else {  $nu = $_GET[nu]; } 
$ref = ($nu +1);
$pg = range(1, $pages, 1);


foreach( $pg as $p) { 
$rec = $p - 1;
$num = $rec*6;
echo "<a href='" . $_SERVER['PHP_SELF'] . "?nu=" . ($num) . "&&cou=" . $cou . "'>$p </a>";
}
echo "<br />";
if($nu+6 >= $rescount) { 

echo "<a href='" . $_SERVER['PHP_SELF'] . "?nu=" . ($nu-6) .  "&&cou=" . $cou . "'>Previous Page </a><br />"; } 
elseif ($nu+6 < $rescount && $nu > 0) { 

echo "<a href='" . $_SERVER['PHP_SELF'] . "?nu=" . ($nu+6) .  "&&cou=" . $cou . "'>Next Page </a><br />";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?nu=" . ($nu-6) .  "&&cou=" . $cou . "'>Previous Page </a><br />"; } 
elseif($nu == 0) { 

echo "<a href='" . $_SERVER['PHP_SELF'] . "?nu=" . ($nu+6) .  "&&cou=" . $cou . "'>Next Page </a><br />";
} 



?>
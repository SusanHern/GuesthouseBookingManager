<?php
include "conf.php";
$numvarray = array('aa' , 'cc' , 'mj' , 'zq' , 'tt' , 'dy');
$numvarray1 = range(1, 12, 1);
shuffle($numvarray);
shuffle($numvarray1);
$ref1 = $numvarray[0];
$ref2 = $numvarray1[0];
$q = $db->query("SELECT * FROM numref ORDER BY num_id DESC LIMIT 1"); 
while($ronum = $q->fetchArray(SQLITE3_ASSOC) ) { 
$numtu = $ronum[num_va];

} 
$ref3 = $ref2 . $ref1 . $numtu;
echo "ref $ref3";
$newnum = $numtu + 1;
$qs = $db->query("UPDATE numref SET num_va = '$newnum' WHERE num_id = '1'");
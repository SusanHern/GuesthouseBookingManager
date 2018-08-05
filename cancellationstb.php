
<?
include "conf.php";
   $sql =<<<EOF
      CREATE TABLE cancellation1
      (cboo_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,

cboo_fname, cboo_lname, cboo_tel, cboo_email, cboo_guestsadult, cboo_guestskids, cboo_status, cboo_bfrom, cboo_tob, cboo_spinstruct, cboo_meals, cboo_cars, cboo_pets, cboo_rate, cboo_accallocat, cboo_acname,
cboo_discountname,
cboo_discountamount,
cboo_discountguests,
cboo_discountid,
cboo_discountname1,
cboo_discountamount1,
cboo_discountguests1,
cboo_discountid1, cboo_type);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>
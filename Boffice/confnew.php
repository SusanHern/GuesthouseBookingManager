<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open("aa1jbguma.db");

      } 


   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "";
   }
?>
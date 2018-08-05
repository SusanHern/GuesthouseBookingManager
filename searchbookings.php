<?php
include "bsl3.php";
?>
<center><input type='text' id='search' placeholder='search for items here'>
<div id='search_results'>tt</div></center>
<script src="jquery-1.9.1.js"></script>
<script>

$("#search_results").slideUp(); 

$("#search").keyup(function(e){ 
e.preventDefault(); 
ajax_search(); 

}); 

function ajax_search(){ 

$("#search_results").show(); 
var one_val=$("#search").val();
$.post("sajax.php", {one_name : one_val}, function(data){
if (data.length>0){ 
$("#search_results").html(data); 
} 

}) } 
</script>
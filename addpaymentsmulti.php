<style>
b{width:100px;
word-wrap:normal;}

</style>
<style>
#pay_num{display:none;}
#pay_tend{display:none;}
#tendered{display:none;}
</style>
<?php
include "bsl3.php";
$id = $_REQUEST[na];
echo "$id";

$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
echo "$row[boo_multigtotal]";
echo "$row[boo_lname]";
$ref = $row[boo_gref]; } 
$q = $db->query("SELECT * FROM petty");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
echo "<b>Name </b> $row[pt_name]<br />";
$pt_add = $row[pt_amount];
$pt_type = $row[pt_type];
if($pt_type == 'add') { 
$aradd[] = $row[pt_amount]; } 
elseif($pt_type == 'less') { 
$arless[] = $row[pt_amount];
} 

 } 
$totaladd = array_sum($aradd);
$totalless = array_sum($arless);
$totalpetty = $totaladd - $totalless;
echo "PETTY CASH BALANCE: $totalpetty";
echo "<div id='mab'><form action='praddpaymulti.php' onsubmit='return validateForm();' name='rform' method='post'>
<b>Payment Name </b><br />
<input type='text' name='pa_name'><br />
<b>Amount</b><br />
<input type='text' name='pa_amount'><br />
<b>Payment Date</b><br />
<input type='date' name='pa_date'><br />
<input type='text' name='pa_bookingid' value='$id'/><br />
<b>Method</b><br />
<button class='itco' id='ch'>Cash</button>
<button class='itco' id='th'>Transfer</button>
<button class='itco' id='gh'>Cheque</button>
<button class='itco' id='ah'>Card</button>
<button class='itco' id='vh'>Voucher</button>
<button class='itco' id='tn'>Tendered</button><br />
<table bgcolor='black' id='pay_num'><tr>
<td><div onclick='amu(this.id);' id='0' class='itco' />0</div></td>
<td><div onclick='amu(this.id);' id='1' class='itco' />1</div></td>
<td><div onclick='amu(this.id)' id='2' class='itco' />2</div></td>
</tr>
<td><div onclick='amu(this.id)' id='3' class='itco' />3</div></td>
<td><div onclick='amu(this.id)' id='4' class='itco' />4</div></td>
<td><div onclick='amu(this.id)' id='5' class='itco' />5</div></td>
</tr>
<td><div onclick='amu(this.id)' id='6' class='itco' />6</div></td>
<td><div onclick='amu(this.id)' id='7' class='itco' />7</div></td>
<td><div onclick='amu(this.id)' id='8' class='itco' />8</div></td>
</tr>
<td><div onclick='amu(this.id)' id='9' class='itco' />9</div></td>
<td><div onclick='amu(this.id)' id='.' class='itco' />.</div></td>

</tr>

</table><br />
<table bgcolor='black' id='pay_tend'><tr>
<td><div onclick='amux(this.id);' id='0' class='itco' />0</div></td>
<td><div onclick='amux(this.id);' id='1' class='itco' />1</div></td>
<td><div onclick='amux(this.id)' id='2' class='itco' />2</div></td>
</tr>
<td><div onclick='amux(this.id)' id='3' class='itco' />3</div></td>
<td><div onclick='amux(this.id)' id='4' class='itco' />4</div></td>
<td><div onclick='amux(this.id)' id='5' class='itco' />5</div></td>
</tr>
<td><div onclick='amux(this.id)' id='6' class='itco' />6</div></td>
<td><div onclick='amux(this.id)' id='7' class='itco' />7</div></td>
<td><div onclick='amux(this.id)' id='8' class='itco' />8</div></td>
</tr>
<td><div onclick='amux(this.id)' id='9' class='itco' />9</div></td>
<td><div onclick='amux(this.id)' id='.' class='itco' />.</div></td>

</tr>

</table><br />

<b>Tendered</b>
<input type='text' id='tendered' name='tendered' />
<textarea rows='10' cols='10' name='pa_method' ></textarea><br />
<b>Payment Reference</b><input type='text' value='$ref' name='pa_ref' />
<br /><input type='submit' name='submit' value='Submit'>
</form><b>CHANGE</b><div id='pay_results'></div></div>";
?>
<script>
$("#ch").click(function(e){ 
        e.preventDefault(); 
document.getElementById("pay_num").style.display = "block";
document.getElementById("pay_tend").style.display = "none";
document.rform.pa_method.value = "Cash";
    }); 
$("#th").click(function(e){ 
        e.preventDefault(); 
document.getElementById("pay_num").style.display = "block";
document.getElementById("pay_tend").style.display = "none";
document.rform.pa_method.value = "Transfer";
    }); 

$("#gh").click(function(e){ 
        e.preventDefault(); 
document.getElementById("pay_num").style.display = "block";
document.getElementById("pay_tend").style.display = "none";
document.rform.pa_method.value = "Cheque";
    }); 
$("#vh").click(function(e){ 
        e.preventDefault(); 
document.getElementById("pay_num").style.display = "block";
document.getElementById("pay_tend").style.display = "none";
document.rform.pa_method.value = "Voucher";
    }); 
$("#tn").click(function(e){ 
        e.preventDefault(); 
document.getElementById("tendered").style.display = "block";

document.getElementById("pay_tend").style.display = "block";
document.getElementById("pay_num").style.display = "none";

    }); 
$("#ah").click(function(e){ 
        e.preventDefault(); 
document.getElementById("pay_num").style.display = "block";
document.getElementById("pay_tend").style.display = "none";
document.rform.pa_method.value = "Card";
    }); 
var bx;

function amu(bx){ 
   
document.rform.pa_amount.value = document.rform.pa_amount.value+bx; } 
var bh;
function amux(bh){ 
   
document.rform.tendered.value = document.rform.tendered.value+bh;
document.getElementById("pay_results").innerHTML = document.rform.tendered.value - document.rform.pa_amount.value;
 } 

</script>
<script>
function validateForm()
{
var x=document.forms["rform"]["pa_name"].value;
if (x==null || x=="")
  {
  alert("Payment name must be filled out");
  return false;
  } 


var xc=document.forms["rform"]["pa_amount"].value;
if (xc==null || xc=="")
  {
  alert("Amount must be supplied");
  return false;
  } 

} 
</script>

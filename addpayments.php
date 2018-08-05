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
<style>
#pay_num{display:none;}
#pay_tend{display:none;}
#tendered{display:none;}
</style>
<?php

include "bsl3.php";

$id = $_REQUEST[id];

echo "<div id='mab'>";
$qta = $db->query("SELECT * FROM salestaxtb");
while($rota = $qta->fetchArray(SQLITE3_ASSOC ) )  { 
$taname = $rota[ta_name];
$taamount = $rota[ta_amount];
$tasy = $rota[ta_currsymbol];
 } 
$q = $db->query("SELECT * FROM paymentstb WHERE pa_booid = '$id'");
while($row = $q->fetchArray(SQLITE3_ASSOC ) )  { 
$paname = $row[pa_name];
$pdd = $row[pa_amount];
echo "payments $pdd";
$paamount[] = $row[pa_amount];

$padates = $row[pa_date];
echo "<tr><td>PAYMENT DATES</td><td></td><td>$padates</td></tr>";

 } 
if(is_array($paamount) ) { 
$patot = array_sum($paamount); } else { 
$patot = 0; } 
echo "<table border=1 cellspacing=0 cellpadding=2>";
$q = $db->query("SELECT * FROM booking WHERE boo_id = '$id'");
echo "<center>";
while($row = $q->fetchArray(SQLITE3_ASSOC) ) { 
$refnum = $row[boo_gref];
$to = $row[boo_tob];
$from = $row[boo_bfrom];
$date1=date_create($to);
$date2=date_create($from);
$diff=date_diff($date1,$date2);
$t = $diff->format("%a");
$length = intval($t);

if($row[boo_discountguests] > 0 && $row[boo_discountguests1] == 0) { 
$disges = $row[boo_rate] * ($row[boo_discountamount] / 100);
$guestdis = $row[boo_discountguests]; 
$disa = $guestdis * $disges;
$dislen1 = $length * $disa;

$ra = $length * ($row[boo_rate] * $row[boo_guestsadult]);
$dislength = $length * ($row[boo_rate]);
$totdis = $dislength - $dislen1;
$rat = $ra + $totdis; } 
elseif($row[boo_discountguests1] > 0 && $row[boo_discountguests] > 0 ) { 
$disges = $row[boo_rate] * ($row[boo_discountamount] / 100);
$guestdis = $row[boo_discountguests]; 
$disa = $guestdis * $disges;
$dislen1 = $length * $disa;

$ra = $length * ($row[boo_rate] * $row[boo_guestsadult]);
$dislength = $length * ($row[boo_rate]);
$totdis = $dislength - $dislen1;


$disgesb = $row[boo_rate] * ($row[boo_discountamount1] / 100);
$guestdisb = $row[boo_discountguests1]; 
$disb = $guestdisb * $disgesb;
$dislen1b = $length * $disb;



$totdisb = $dislength - $dislen1b;
$rat = $ra + $totdis + $totdisb;

 }else { 
$rat = $length * ($row[boo_rate] * $row[boo_guestsadult]); } 

echo "<tr><td>" . 'NUMBER OF DAYS : ' . "$length</td><td>TOTAL OWING $tasy $rat </td></tr>";
$allocate = $row[boo_accallocat]; } 


$qt = $db->query("SELECT * FROM addtobilltb WHERE bill_booid = '$id'");

while($ro = $qt->fetchArray(SQLITE3_ASSOC) ) { 
echo "<tr><td>$ro[bill_name]</td>";
echo "<td>$ro[bill_amount]</td></tr>"; 
$addedstot[] = $ro[bill_amount];

} 
if(is_array($addedstot) ) { 
$sum = array_sum($addedstot); } else { 
$sum = 0; } 
$tot = $rat + $sum;
$bal = $tot - $patot;
$amounttodiv = $taamount + 100;
$amounttodiv = $taamount + 100;
if($salestaxtype == 'included') { 
$salestax = round($tot * $taamount / $amounttodiv, 2); } 
else { 
$salestax = round($tot * $taamount/100, 2);
} 


echo "<tr><td>Total with additions</td><td>$tasy $tot</td><td>Inc $taname $salestax</td></tr>";
echo "<tr><td>Less</td><td>Payments</td><td>$tasy $patot</td></tr>";
echo "<tr><td>Balance</td><td>Payments and Additions</td><td>$tasy $bal</td></tr>";
echo "</table></div>";
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
if(is_array($aradd) ) { 
$totaladd = array_sum($aradd); } else { 
$totaladd = 0; } 
if(is_array($arless) ) { 
$totalless = array_sum($arless); } else { 
$totalless = 0; } 
$totalpetty = $totaladd - $totalless;
echo "PETTY CASH BALANCE: $totalpetty";

echo "<div id='mab'><form action='praddpay.php' onsubmit='return validateForm();' name='rform' method='post'>
<b>Payment Name </b><br />
<input type='text' name='pa_name'><br />
<b>Amount</b><br />
<input type='text' id='pa_amount' name='pa_amount'><br />
<b>Date</b><br />
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
<textarea rows='10' cols='10' name='pa_method' ></textarea>
<br /><b>Reference Number</b><input type='text' name='refnum' value='$refnum' /><input type='submit' name='submit' value='Submit'>
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
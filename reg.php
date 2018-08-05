<?
$foo = $_SERVER[SERVER_NAME];
if($foo === 'www.trendidesigns.co.za' || $foo === 'trendidesigns.co.za') { 
function NewReg()

    { 
     include "conf.php";

        if (empty($_POST['us'])) {
            echo  "Please supply a mobile number as your username";
        } elseif (empty($_POST['ps']) || empty($_POST['psr'])) {
            echo "you must select a password";
        } elseif ($_POST['ps'] !== $_POST['psr']) {
            echo "Password and password repeat are not the same";
        } elseif (strlen($_POST['ps']) < 6) {
            echo  "Password must be at least six characters in length, but less than sixty characters";
        } elseif (strlen($_POST['us']) > 10 || strlen($_POST['us']) < 10) {
            echo "Username cannot be shorter than 10 numbers";
        }  
 elseif (preg_replace("/[^a-zA-Z0-9]/", "", $_POST['ps']) != $_POST['ps']) {
            echo "Password may only contain letters and numbers";
        } 
 elseif (preg_replace("/[^0-9]/", "", $_POST['us']) != $_POST['us']) {
            echo "Username may be numbers only";
        } 
elseif (!empty($_POST['us'])
            && strlen($_POST['us']) <= 10
            && strlen($_POST['us']) >= 10
            && strlen($_POST['ps']) >=6
 && strlen($_POST['ps']) <=60
            
            
            && !empty($_POST['ps'])
            && !empty($_POST['psr'])
            && ($_POST['ps'] === $_POST['psr'])
        ) { 
include "../lib.php";
 
$us = base64_encode(numm($_POST['us']));


                // check 
                $sql = $db->query("SELECT * FROM cust WHERE cu_phone_mobile = '$us'");
while($row = $sql->fetchArray(SQLITE3_ASSOC) ) { 
$uname = $row[cu_phone_mobile];


 } 
                
                if ($_POST['us'] == $uname) { 
echo "That number already exists in our database, please select another or use our lost password facility if you cannot remeber a previous registration"; 
                    } 
                 else { 
  $password_hash = crypt($_POST['ps']);

$sql = $db->query("SELECT * FROM cust");
while($row = $sql->fetchArray(SQLITE3_ASSOC) ) { 
$num[] = $row[cu_id];
 } 
$nf = count($num);


$array = array('aa', 'b', 'zz', 'q', 'bm', 'kl');
shuffle($array);
$px = $array[0];

$pxc = $px . $nf;


                    $sq = $db->exec("INSERT INTO cust(cu_phone_mobile, cu_ps) VALUES('$us', '$pxc')");

$qu = "INSERT INTO str(ca, pf) VALUES('$pxc', '$password_hash')";
$res = $db->exec($qu);
                    echo "Registration sucessfull you may now login<a style='width:300px;height:200px;position:absolute;top:200px;left:300px;background:black;color:white;border:1px solid gray;border-radius:15%;padding:30px;font-size:40px'; href='index.php'>Home</a>";
$subject = 'new';
$message = "<h2>New</h2>$us";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'To:  Susan <susan@quickchef.co.za>' . "\r\n";
$headers .= 'From: Quick Chef <info@quickchef.co.za>' . "\r\n";
$headers .= 'Cc: susan.hern@icloud.com' . "\r\n";
$headers .= 'Bcc: '; 
$ar = array('freeublue@gmail.com' . ', ', 'susan.hern@icloud.com, ');
$headers .=implode(',', $ar);
mail($to, $subject, $message, $headers);

                    
    } } } 
NewReg(); } else { 
echo " "; } 

?> 
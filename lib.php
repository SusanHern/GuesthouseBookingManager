<?php
function flushe($var) 
{ 
$new1 = trim($var);
$new2 = htmlspecialchars($new1);
$new3 = addslashes($new2);
return $new3; 
} 
function po($field, $nah) { 
if(EMPTY($_POST[$field] ) ) { 
echo "<br />$nah must be filled out<br /><a href='$_SERVER[PHP_SELF]'>$_SERVER[PHP_SELF]</a><br />"; } } 

function select($name,$array) 
{
echo "<select name='$name'>";
echo "<option value='sel'>Select</option>";
foreach ($array as $num) {

echo "<option value='$num'>$num</option>"; 
} 
echo "</select>"; 
} 

function dz($bd) { 
$bd = str_replace('@', ' 7z* 7z ', $bd);
$bd = str_replace('.', ' 8x- 8x ', $bd);


return $bd; } 
function dzz($bd) { 
$bd = str_replace(' 7z* 7z ', '@', $bd);
$bd = str_replace('8x- 8x ', '.', $bd);


return $bd; } 
function dr($bd) { 
$bd = str_replace('a', ' 7z* 7z ', $bd);
$bd = str_replace('s', ' 8x- 8x ', $bd);
$bd = str_replace('e', ' 4q* q4 ', $bd);
$bd = str_replace('o', ' 6v- v6 ', $bd);
$bd = str_replace('i', ' 5u.. u5 ', $bd);

return $bd; } 
function drr($bd) { 

$bd = str_replace(' 7z* 7z ', 'a', $bd);
$bd = str_replace(' 8x- 8x ', 's', $bd);
$bd = str_replace(' 4q* q4 ', 'e', $bd);
$bd = str_replace(' 6v- v6 ', 'o', $bd);
$bd = str_replace(' 5u.. u5 ', 'i', $bd); 
return $bd; } 


function numm($num) { 
$cc = str_replace('1', 'd', $num);
$cc = str_replace('2', 'a', $cc);

return $cc;
} 
function nummr($num) { 
$cc = str_replace('d', '1', $num);
$cc = str_replace('a', '2', $cc);

return $cc;
} 
function selec($name,$array,$array2) 
{ 
$newarray = array_combine($array, $array2);
echo "<select name='$name'>";
echo "<option value='sel'>Select</option>";
foreach ($newarray as $ke =>$vl) {

echo "<option value='$ke'>$vl</option>"; 
} 
echo "</select>"; 
} 




function password($na6) 
{ 
echo "<input type='password' name='$na6' />";
} 

function submit($na,$va) 
{ 
echo "<input type='submit' name='$na' value='$va' />";
} 


function textj($id, $jsc) 
{ 

echo "<input type='text'  id='$id' onkeyup='$jsc'/>";
} 
function text($named) 
{ 

echo "<input type='text' name='$named' />";
} 



function textv($named, $val) 
{ 

echo "<input type='text' name='$named' value='$val'/>";
}



function radio($nam,$arrarys) 
{ 
foreach ($arrarys as $arr) 
{ 
echo "<input type='radio' name='$nam' value='$arr' />$arr<br />";
} 
} 
function checkbox($namex,$arrayx) 
{ 
$nas ='namex[]';
 
foreach ($arrayx as $arx) 
{ 
echo "<input type='checkbox' name='$nas' value='$arx' />$arx<br />"; 
} 
} 

function hidden($nat,$vare) 
{ 
echo "<input type='hidden' name='$nat' value='$vare' />";
} 

function texta($namg,$ro,$co) 
{ 
echo "<textarea rows='$ro' cols='$co' name='$namg'></textarea>";
} 




function upimg($db) 
{ 
include "$db";
if (!isset($_POST[upload]) )  
{ 
echo "<form enctype='multipart/form-data' action='$_SERVER[PHP_SELF]' method='POST'>";
$title = 'title';
$des = 'des';
echo "<b>Enter title</b><br />";
text($title);
echo "<br />";
echo "<b>Give a short description</b><br />";
$ro = 10;
$co = 20;
texta($des, $ro, $co);
echo "<br />";
echo"<input type='hidden' name='MAX_FILE_SIZE' value='30000000' /><input name='userfile' type='file' id='userfile' /><br /><input name='upload' type='submit' style='background-color:black;color:blue;border:1px solid brown;' id='upload' value='Upload'></form>";
} 
else 
{  
print_r($_FILES);
print_r($_POST);
$ar = array('png' , 'jpg' , 'gif');
$title = $_POST[title];
$des = $_POST[des];
echo $_FILES['userfile'] ['tmp_name'];
echo "<br />";
if (isset($_ENV['WINDIR'] ) ) 
{ 
$fil1 = str_replace("\\\\", "\\", $_FILES['userfile'] ['name']);
$fil = substr($fil1, -3);
if ($fil != $ar['0'] || $fil != $ar['1'] || $fil != $ar['2']) 
{ 
echo "You have uploaded a file in the wrong formatt, only jpg, gif or png allowed"; 
} 
} 
else 
{ 
$fileName = $_FILES['userfile'] ['name'];
$tmpName = $_FILES['userfile'] ['tmp_name'];
$fileSize = $_FILES['userfile'] ['size'];
$fp = fopen($tmpName, 'r');
$content = fread($fp, $fileSize);
$content = addslashes($content);
fclose($fp);
$picture = str_replace(' ', '_', $tmpName);
$source = $picture;
$target = 'pic/' . $fileName;
move_uploaded_file($source, $target );

echo "File<b> $fileName</b> uploaded as id= $id<br>";

$sql = "INSERT INTO im(us, ps, img, ti, des, timestamp) values($us, $ps, $target, $title, $des, datetime('now') )";
$res = sqlite_query($db, $sql);

echo "File<b> $fileName</b> uploaded<br>";
echo "<b>thank-you for your submission</b></br >"; 
} 
} 
} 






function cl( $input )
{
    $input = trim( htmlentities( strip_tags( $input,"," ) ) );

    if( get_magic_quotes_gpc() )
        $input = stripslashes( $input );

    $input = SQLite3::escapeString( $input );
    return $input;
} 

//jiju Thomas Mathew
function cr($stp, $string, $action = 'enc'){
            $res = '';
            if($action !== 'enc'){
                $string = base64_decode($string);
            } 
            for( $i = 0; $i < strlen($string); $i++){
                    $c = ord(substr($string, $i));
                    if($action == 'enc'){
                        $c += ord(substr($stp, (($i + 1) % strlen($stp))));
                        $res .= chr($c & 0xFF);
                    }else{
                        $c -= ord(substr($stp, (($i + 1) % strlen($stp))));
                        $res .= chr(abs($c) & 0xFF);
                    }
            }
            if($action == 'enc'){
                $res = base64_encode($res);
            } 
            return $res;
    } 



?>
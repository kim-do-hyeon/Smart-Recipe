<?php
session_start();
if (isset($_SESSION['id']))
{
	$login_chk = 1;
}
else
{
	$login_chk = 0;
}
if ($login_chk == 1)
{
	$fp = fopen("output.txt","r"); 
if(!$fp)
{
 echo "error"; 
} 

while(!feof($fp))
{
  $str = fgets($fp,100); 
  $arr[] = $str;
} 

for($i=0; $i<sizeof($arr); $i++)
{ 
 echo $arr[$i]."<br>"; 
} 
$title = $arr[0];
$telephone = $arr[1];
$category = $arr[2];
$address = $arr[3];
$roadAddress =  $arr[4];

fclose($fp); 

error_reporting(E_ALL);
ini_set("display_errors", 1);
$host = 'localhost';
$user = 'root';
$pw = 'PENTAL2525@@!!';
$dbName = 'syswow64';
$mysqli = new mysqli($host, $user, $pw, $dbName);

extract($_POST);
$id = $_SESSION["id"];
$q = "INSERT INTO User (id, title, telephone, category, address, roadAddress ) VALUES ('$id', '$title', '$telephone', '$category', '$address', '$roadAddress' )";
$mysqli->query( $q);
$mysqli->close();
echo ("<script>alert('Successful Your Process');location.href='./upload.php';</script>");
}
else
{
	echo ("<script>alert('Login Please!');location.href='http://api.system32.kr/#login';</script>");
}

?>
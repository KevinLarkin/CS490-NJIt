<?php


$ch = curl_init();
echo count($_POST);
/*echo $_POST["ExamName"];
echo $_POST["cmd"];
echo $_POST["submit"];*/
curl_setopt( $ch,CURLOPT_URL,"http://afsaccess2.njit.edu/~ls339/cs490/middle/beta/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$_POST);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
//echo $send;
?>


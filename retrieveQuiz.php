<?php     
   $ch = curl_init();
curl_setopt( $ch,CURLOPT_URL,"https://web.njit.edu/~ls339/cs490/middle/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,"cmd=getExams");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
echo $send;
$quiz = $send;
?>
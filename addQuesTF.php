<?php
        $Question = $_POST['Question'];
	$Answer = $_POST['Answer'];
        $test = "cmd=addTFQuestion&Question=".$Question."&Answer=".$Answer;
        //echo $test;
$ch = curl_init();

curl_setopt( $ch,CURLOPT_URL,"http://afsaccess2.njit.edu/~ls339/cs490/middle/beta/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$test);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
echo $send;
        ?>


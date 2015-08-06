<?php
        $Question = $_POST['Question'];
	$Answer = $_POST['Answer'];
        $diff = $_POST['diff'];
        $testOE = "cmd=addOEQuestion&Question=".$Question."&Answer=".$Answer."&weight=".$diff;
        $ch = curl_init();
curl_setopt( $ch,CURLOPT_URL,"https://web.njit.edu/~ls339/cs490/middle/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$testOE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
$var = json_decode($send);
if($var->{'message'}=='ok'){
    header('Location: create1.php?qid='.$var->{'qid'});
}else{
    echo "Contact admin for more help";
}
        ?>


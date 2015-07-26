<?php
 $ch = curl_init();
$testing = "cmd=takeExam&examName=".$_GET["examName"]."&username=".$_SESSION["username"]."&qid=".$_GET["qid"];
//echo $testing;
curl_setopt( $ch,CURLOPT_URL,"http://afsaccess2.njit.edu/~ls339/cs490/middle/beta/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
//curl_setopt($ch,CURLOPT_POSTFIELDS,$_POST);
curl_setopt($ch,CURLOPT_POSTFIELDS,"cmd=takeExam&examName=".$_GET["examName"]."&username=".$_SESSION["user"]."&qid=".$_GET["qid"]);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
//echo $send;
//echo "this is working";

$var = json_decode($send);
//echo count($var);
//echo $var->{question};

if($var->{type}=='tf'){
    echo $var->{question};
    echo "TF";
}
if($var->{type}=='mc'){
    echo $var->{question};
    echo "MC";
}
if($var->{type}=='oe'){
    echo $var->{question};
    echo "OE";
}
if($var->{previous}!=NULL){
    echo "<a href=\"takeQuiz.php?examName=".$_GET["examName"]."&qid=".$var->{previous}."\"> previous </a>";
}
if($var->{next}!=NULL){
    echo "<a href=\"takeQuiz.php?examName=".$_GET["examName"]."&qid=".$var->{next}."\"> next </a>";
}
?>


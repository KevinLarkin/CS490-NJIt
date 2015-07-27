<?php
 ob_start();
    session_start();
    if(!isset($_SESSION['teacher']))header('Location: index.html');
    include('thead.php');
?>
<?php

$dataString = 'cmd=newExam';
$ch = curl_init();

curl_setopt( $ch,CURLOPT_URL,"http://afsaccess2.njit.edu/~ls339/cs490/middle/beta/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
//echo $send;
//echo count($send);
$questions= json_decode($send);
//echo count($questions);
//echo $questions[0]->{'question'};
?>
<form action= "addQuiz.php" method="POST">
    <br/>
    Insert Exam Name Here<br/>
    <input type="text" name="ExamName">
    <br/>
    <input type="hidden" name="cmd" value="createExam">
<?php
for ($i=0; $i< count($questions); $i++){
    echo "<input type=\"checkbox\" name=\"q".$i."\" value=\"".$questions[$i]->{qid}."\" >";
    echo $questions[$i]->{"question"}."<br>";
}
?>
<input name="submit" type="submit" value="Submit">
</form>

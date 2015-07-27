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
//echo $questions->{'message'};
if(count($questions)==0){
echo  "<form action= \"addQuiz.php\" method=\"POST\">";
echo  "<br/>";
echo  "Insert Exam Name Here<br/>";
echo  "<input type=\"text\" name=\"ExamName\">";
echo  "<br/>";
echo  "<input type=\"hidden\" name=\"cmd\" value=\"createExam\">";

for ($i=0; $i< count($questions); $i++){
    echo "<input type=\"checkbox\" name=\"q".$i."\" value=\"".$questions[$i]->{qid}."\" >";
    echo $questions[$i]->{"question"}."<br>";
}

echo "<input name=\"submit\" type=\"submit\" value=\"Submit\">";
echo "</form>";}else{
    echo "There are no Questions to make a Quiz";
}
        ?>

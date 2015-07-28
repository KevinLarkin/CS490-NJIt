<?php
 ob_start();
    session_start();
    if(!isset($_SESSION['teacher']))header('Location: index.html');
    include('thead.php');
?>
<style>
th,td {padding:5px;}
</style>
<?php

$dataString = 'cmd=newExam';
$ch = curl_init();

curl_setopt( $ch,CURLOPT_URL,"http://afsaccess2.njit.edu/~ls339/cs490/middle/beta/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
echo $send;
//echo count($send);
$questions= json_decode($send);
//echo count($questions);
//echo $questions->{'message'};
if(count($questions)>0){
echo  "<form action= \"addQuiz.php\" method=\"POST\">";
echo  "<br/>";
echo  "Insert Exam Name Here<br/>";
echo  "<input type=\"text\" name=\"ExamName\">";
echo  "<br/>";
echo  "<input type=\"hidden\" name=\"cmd\" value=\"createExam\">";

echo    "<table border=\"1\">";
echo    "<tr>";
echo    "<th>Selcct Question</th>";
echo    "<th>Question</th>" ;
echo    "<th>Weight</th>";
echo    "<th>Type</th>";
echo "</tr>";
    for ($i = 0; $i < count($questions); $i++) {
      echo "<tr>";
      echo "<td><input type=\"checkbox\" name=\"q".$i."\" value=\"".$questions[$i]->{qid}."\" ></td>";
      //echo "<td>".$questions[$i]->{qid}."</td>";
      //echo "<td>".$questions[$i]->{quesion}."</td>";
      echo "<td>".$questions[$i]->{"question"}."<br></td>";
      echo "<td>".$questions[$i]->{weight}."</td>";
      echo "<td>".$questions[$i]->{type}."</td>";
      echo "</tr>";
  }
    echo"</table>";

/*for ($i=0; $i< count($questions); $i++){
    echo "<input type=\"checkbox\" name=\"q".$i."\" value=\"".$questions[$i]->{qid}."\" >";
    echo $questions[$i]->{"question"}."<br>";
}*/

echo "<input name=\"submit\" type=\"submit\" value=\"Submit\">";
echo "</form>";}else{
    echo "There are no Questions to make a Quiz";
}
        ?>

<?php
 ob_start();
    session_start();
    if(!isset($_SESSION['teacher']))header('Location: index.html');
    include('thead.php');
?>
<style>
th,td {padding:5px;}
//if {display: inline}
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
echo    "<table border=\"1\ class=\"inlineTable\" <!--style=\"float:left-->\">";
echo    "<tr>";
echo    "<th>Selcct Question</th>";
echo    "<th>Question</th>" ;
echo    "<th>Weight</th>";
echo    "<th>Type</th>";
echo "</tr>";
    for ($i = 0; $i < count($questions); $i++) {
      echo "<tr>";
      echo "<td><input type=\"checkbox\" name=\"q".$i."\" value=\"".$questions[$i]->{qid}."\" ></td>";
      echo "<td>".$questions[$i]->{"question"}."<br></td>";
      echo "<td>".$questions[$i]->{weight}."</td>";
      echo "<td>".$questions[$i]->{type}."</td>";
      echo "</tr>";
  }
  //echo "<input name=\"submit\" type=\"submit\" value=\"Submit\" style=\"float:left\>";
    echo"</table>";
echo "<input name=\"submit\" type=\"submit\" value=\"Submit\">";
echo "</form>";}else{
    echo "There are no Questions to make a Quiz";
}

/*if(count($questions)>0){
echo  "<form action= \"addQuiz.php\" method=\"POST\">";
//echo  "<br/>";
//echo  "Insert Exam Name Here<br/>";
//echo  "<input type=\"text\" name=\"ExamName\">";
//echo  "<br/>";
echo  "<input type=\"hidden\" name=\"cmd\" value=\"createExam\">";
echo    "<table border=\"1\ class=\"inlineTable\" style=\"float:right\">";
echo    "<tr>";
echo    "<th>Selcct Test</th>";
echo    "<th>Test</th>" ;
echo "</tr>";
    for ($i = 0; $i < count($questions); $i++) {
      echo "<tr>";
      echo "<td><input type=\"checkbox\" name=\"q".$i."\" value=\"".$questions[$i]->{qid}."\" ></td>";
      echo "<td>".$questions[$i]->{"test"}."<br></td>";
      echo "</tr>";
  }
  echo "<input name=\"submit\" type=\"submit\" value=\"Submit\" style=\"float:right\">";
    echo"</table>";
//echo "<input name=\"submit\" type=\"submit\" value=\"Submit\" style=\"float:right\">";
echo "</form>";}else{
    echo "There are no Questions to make a test";
}*/
        ?>

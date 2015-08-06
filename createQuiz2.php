<?php
 ob_start();
    session_start();
    if(!isset($_SESSION['teacher']))header("Location: index.php");
    include('thead.php');
?>
<style>
th,td {padding:5px;}
</style>
<script src="java.js"></script>
<body onload="filterb()">
<?php
$dataString = 'cmd=newExam';
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL,"https://web.njit.edu/~ls339/cs490/middle/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS, "cmd=getExamList");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$testList=curl_exec($ch);
$tests= json_decode($testList);
?>
<center>
<table><tr>
        <th>Available Quizzes</th>
<?php
for($i=0;$i<count($tests);$i++) {
    echo "<td><a href=quizInfo.php?examId=".$tests[$i]->{'Id'}." >".$tests[$i]->{'TestName'}."</a></td>";   
}
?>
    </tr>
</table>
</center>
<p id='output' ></p>
<?php
echo "<hr>";
echo "<center>";
echo "<h1>New Quiz</h1>";
echo "<table border=\"1\">";
echo "<tr><td><form action= \"addQuiz.php\" id=\"newExamForm\" method=\"POST\">";
echo "Insert Exam Name Here<br/>";
echo "<input type=\"text\" name=\"ExamName\">";
echo "<input type=\"hidden\" name=\"cmd\" value=\"createExam\">";
echo "<input name=\"submit\" type=\"submit\" value=\"Create Quiz\">";
echo "</form></td></tr></table>";
echo "<hr>";
echo "<h1>Available Questions</h1>";
echo "<table><th>Filter by: </th><tr><td>";
echo "<form method=\"POST\">";
echo "<label> Type  </label>";
echo "<select id=\"type\" onChange=\"filterb()\">";
echo "<option>All</option>";
echo "<option>True False</option>";
echo "<option>Multiple Choice</option>";
echo "<option>Fill in the blank</option>";
echo "<select>";
echo "<label> Weight </label>";
echo "<select id=\"weight\" onChange=\"filterb()\">";
echo "<option>All</option>";
echo "<option>Easy</option>";
echo "<option>Medium</option>";
echo "<option>Hard</option>";
echo "<select>";
echo "</form>";
echo "</table></tr></td>";
    echo "<table border=\"1\" class=\"inlineTable\" id=\"questionList\">";
    echo "<tr>";
    echo "<th>Select Question</th>";
    echo "<th>Question</th>";
    echo "<th>Weight</th>";
    echo "<th>Type</th>";
    echo "</tr>";
    echo "<tbody id=\"qList\"></tbody>";
    echo"</table>";
    echo "</form></center>";
        ?>
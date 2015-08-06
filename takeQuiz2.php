<?php
     ob_start();
    session_start();
    if(!isset($_SESSION['student']))header('Location: index.php');
    include('studentHeader.php');
?>
<script src="java.js"></script>
<?php
if($_POST['cmd']=='checkAnswer'){
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL,"https://web.njit.edu/~ls339/cs490/middle/proc.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $check_send = curl_exec($ch);
    $checkAnswer = json_decode($check_send);
}
 $ch = curl_init();
curl_setopt( $ch,CURLOPT_URL,"https://web.njit.edu/~ls339/cs490/middle/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,"cmd=takeExam&examName=".$_GET["examName"]."&username=".$_SESSION["user"]."&qid=".$_GET["qid"]."&userid=".$_SESSION['userId']."&userAnswer=".$userAnswer);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
$var = json_decode($send);
?>
<center><table border="1">
  <tr>
      <th>Answered</th>
      <th>Total</th>
  </tr>
<?php
    echo "<tr>";
    echo "<td>".$var->{'numberOfAnsweredQuestions'.$i}."</td>";
    echo "<td>".$var->{'numberOfQuestions'.$i}."</td>";
    echo "</tr>";
?>
</table></center>

<table>
    <tr>
        <td>
<?php
if($var->{type}=='tf'){
    echo "<b>".$var->{question}."</b>";
    echo "<form method= \"POST\">";
    if($checkAnswer->{userAnswer}=='True'||$var->{userAnswer}=='True'){
        echo "<input type=\"radio\" name=\"Answer\" value=\"True\" checked=\"checked\">True<br>";
    }else{
        echo "<input type=\"radio\" name=\"Answer\" value=\"True\">True<br>";
    }
    if($checkAnswer->{userAnswer}=='False'||$var->{userAnswer}=="False"){
        echo "<input type=\"radio\" name=\"Answer\" value=\"False\" checked=\"checked\">False<br>";
    }else{
        echo "<input type=\"radio\" name=\"Answer\" value=\"False\">False<br>";
    }
    echo "<input type=\"hidden\" value=\"TF\" name=\"Type\">";
    echo "<input type=\"hidden\" value=\"checkAnswer\" name=\"cmd\">";
    echo "<input type=\"hidden\" value=\"".$var->{current}."\" name=\"current\">";
    echo "<input type=\"hidden\" value=\"".$_SESSION["user"]."\" name=\"user\">";
    echo "<input type=\"hidden\" value=\"".$_SESSION["userId"]."\" name=\"userId\">";
    echo "<input type=\"hidden\" value=\"".$_GET["examName"]."\" name=\"examName\">";
    echo "<input type=\"submit\" value=\"Save Answer\">";
    echo "</form>";
}
if($var->{type}=='mc'){
    echo "<b>".$var->{question}."</b>";
    echo "<form method= \"POST\">";
    if($checkAnswer->{userAnswer}=='A'||$var->{userAnswer}=='A'){
        echo "<input type=\"radio\" name=\"Answer\" value=\"A\" checked=\"checked\">".$var->{Opt0}."<br>";
    }else{
        echo "<input type=\"radio\" name=\"Answer\" value=\"A\">".$var->{Opt0}."<br>";
    }
    if($checkAnswer->{userAnswer}=='B'||$var->{userAnswer}=='B'){
        echo "<input type=\"radio\" name=\"Answer\" value=\"B\" checked=\"checked\">".$var->{Opt1}."<br>";
    }else{
        echo "<input type=\"radio\" name=\"Answer\" value=\"B\">".$var->{Opt1}."<br>";
    }
    if($checkAnswer->{userAnswer}=='C'||$var->{userAnswer}=='C'){
        echo "<input type=\"radio\" name=\"Answer\" value=\"C\" checked=\"checked\">".$var->{Opt2}."<br>";
    }else{
        echo "<input type=\"radio\" name=\"Answer\" value=\"C\">".$var->{Opt2}."<br>";
    }
    if($checkAnswer->{userAnswer}=='D'||$var->{userAnswer} =='D'){
        echo "<input type=\"radio\" name=\"Answer\" value=\"D\" checked=\"checked\">".$var->{Opt3}."<br>";
    }else{
        echo "<input type=\"radio\" name=\"Answer\" value=\"D\">".$var->{Opt3}."<br>";
    }
    echo "<input type=\"hidden\" value=\"MC\" name=\"Type\">";
    echo "<input type=\"hidden\" value=\"checkAnswer\" name=\"cmd\">";
    echo "<input type=\"hidden\" value=\"".$var->{current}."\" name=\"current\">";
    echo "<input type=\"hidden\" value=\"".$_SESSION["user"]."\" name=\"user\">";
    echo "<input type=\"hidden\" value=\"".$_SESSION["userId"]."\" name=\"userId\">";
    echo "<input type=\"hidden\" value=\"".$_GET["examName"]."\" name=\"examName\">";
    echo "<input type=\"submit\" value=\"Save Answer\">";
    echo "</form>";
}
if($var->{type}=='oe'){
    echo "<b>".$var->{question}."</b>";
    echo "<form method= \"POST\">";
    if($checkAnswer->{userAnswer} != '' && $var->{userAnswer} == ''){
        echo "<input type=\"text\" name=\"Answer\" value=\"".$checkAnswer->{'userAnswer'}."\"><br>";
    } else if($checkAnswer->{userAnswer} == '' && $var->{userAnswer} != ''){
        echo "<input type=\"text\" name=\"Answer\" value=\"".$var->{'userAnswer'}."\"><br>";
    } else if($checkAnswer->{userAnswer} != '' && $var->{userAnswer} != '') {
        echo "<input type=\"text\" name=\"Answer\" value=\"".$var->{'userAnswer'}."\"><br>"; 
    } else {
        echo "<input type=\"text\" name=\"Answer\">";
    }
    echo "<input type=\"hidden\" value=\"OE\" name=\"Type\">";
    echo "<input type=\"hidden\" value=\"checkAnswer\" name=\"cmd\">";
    echo "<input type=\"hidden\" value=\"".$var->{current}."\" name=\"current\">";
    echo "<input type=\"hidden\" value=\"".$_SESSION["user"]."\" name=\"user\">";
    echo "<input type=\"hidden\" value=\"".$_SESSION["userId"]."\" name=\"userId\">";
    echo "<input type=\"hidden\" value=\"".$_GET["examName"]."\" name=\"examName\">";
    echo "<input type=\"submit\" value=\"Save Answer\">";
    echo "</form>";
}
if($var->{previous}!=NULL){
    echo " <a href=\"takeQuiz2.php?examName=".$_GET["examName"]."&qid=".$var->{previous}."\"> previous";
}
if($var->{next}!=NULL){
    echo "<a href=\"takeQuiz2.php?examName=".$_GET["examName"]."&qid=".$var->{next}."\"> next </a> ";
}
?>
        </td>
    </tr>
</table>
<form method="POST">
   <input type="hidden" value="<?php echo $_GET['examName'];?>"id="examName">
   <input type="hidden" value="<?php echo $_SESSION["user"];?>"id="user">
   <input type="hidden" value="<?php echo $_SESSION["userId"];?>"id="userId">
   <input type="hidden" value="<?php echo $var->{'numberOfAnsweredQuestions'.$i};?>"id="answered">
   <input type="hidden" value="<?php echo $var->{'numberOfQuestions'.$i};?>"id="total">
   <input type="hidden" value="submitExam" id="cmd">
   <input type="button" onclick="finalSubmit()" value="Submit Quiz">
</form>

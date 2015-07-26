<?php
     ob_start();
    session_start();
    if(!isset($_SESSION['teacher']))header('Location: index.html');
    include('thead.php');
?>

<!--<div class="create-content">
    <h1>Release Grades</h1>
    <form class="choice" action="http://web.njit.edu/~kl293/CS490/release.php" method="post">
                <input type="submit" value="Release Grades">
    </form>
</div>
<div class="create-content">

    <h1>Get Grades</h1>
    <form class="choice" action="http://web.njit.edu/~kl293/getStudentGrade.php" method="post">
                <input type="submit" value="Get Grades">
    </form>
    <br />

</div>-->

    <?php
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~ls339/cs490/middle/beta/proc.php");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "cmd=examScores");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $send = curl_exec($ch);
  //echo $send;
  
  $var = json_decode($send);
  //echo count($var);
  
  ?>

<table border="1">
  <tr>
    <td>Name</td>
    <td>Exam</td> 
    <td>Score</td>
    <td>Release Grades</td>
  </tr>
  <?php
    for ($i = 0; $i < count($var); $i++) {
      echo "<tr>";
      echo "<td>".$var[$i]->{name}."</td>";
      echo "<td>".$var[$i]->{exam}."</td>";
      echo "<td>".$var[$i]->{score}."</td>";
      //echo "<td>".$var[$i]->{releaseStatus};
      echo "<td>";
      if($var[$i]->{releaseStatus}==0){
          echo "<form action= \"realeaseGrades.php\" method= \"POST\">";
          echo "<input type=\"hidden\" name=\"user\" value=\"".$var[$i]->{name}."\">";
          echo "<input type=\"hidden\" name=\"name\" value=\"".$var[$i]->{exam}."\">";
          echo "<input type=\"hidden\" name=\"cmd\" value=\"releaseScore\">";
          echo "<input type=\"submit\" name=\"submit\" value=\"Release Score\">";
          echo "</form>";
      }else{
          echo "Already Released";
      }
      echo "</td></tr>";
  }
  ?>
</table>
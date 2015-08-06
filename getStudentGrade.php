<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['student']))header("Location: index.php");
    include('studentHeader.php');
?>
<?php
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL,"https://web.njit.edu/~ls339/cs490/middle/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$_POST);
curl_setopt($ch,CURLOPT_POSTFIELDS,"cmd=getScores&userId=".$_SESSION['userId']);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);
$var = json_decode($send);
?>
<center><table border="1">
    <tr>
        <th>Quiz Name</th>
        <th>Grade</th>
    </tr>
    <?php
    for ($i = 0; $i < count($var); $i++) {
        echo "<tr>";
        echo "<td>".$var[$i]->{exam}."</td>";
        echo "<td><a href=\"feedback.php?exam=".$var[$i]->{exam}."&score=".$var[$i]->{score}."\">".$var[$i]->{score}."<a></td>";
        echo "</tr>";
    }
        ?>
    </table></center>
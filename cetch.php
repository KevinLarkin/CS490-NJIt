<?php
session_start();
$username=$_POST["username"];
$password=$_POST["password"];
$ch = curl_init();

curl_setopt( $ch,CURLOPT_URL,"http://afsaccess2.njit.edu/~ls339/cs490/middle/beta/proc.php");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,"cmd=auth&username=".$username."&password=".$password);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$send=curl_exec($ch);

$var = json_decode($send);
//echo $send;

if($var->{'login'}=="ok"){
    $_SESSION["user"]=$username;
    if($var->{'type'}=="instructor"){
        //echo 'teacher';
        $_SESSION["teacher"]='true';
        header('Location: https://web.njit.edu/~kl293/CS490/teacher.php');
        }
    else if ($var->{'type'}=="student"){
        //echo 'student';
        $_SESSION["student"]='true';
        header('Location: https://web.njit.edu/~kl293/CS490/student.php');
    }
 }else{
        //header('Location: https://web.njit.edu/~kl293/CS490/index.php');
        //echo "Fail login please try again";
     echo "alert(\"Fail login\")";
}
?>

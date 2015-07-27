<?php
    session_start();
    
    include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>CS490</title>
<body>

<style>
    body    {background-color:#33ffff}
h1      {color:red}
p       {color:green}
</style>

<center><h1>WELCOME</h1>
<p>This is the last website you will EVER log into</p>

<form action='cetch.php' method="POST">

<br>
Username:<br>
<input type="text" name="username">
<br>
Password:<br>
<input type="password" name="password">
<br><br>

<input name="submit" type="submit" value="Submit">
</form>
<p id ="output"></p>
</center>
</body>
</html>



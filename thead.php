<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include('header.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<title>Grades</title>
        <style> 
            li{
            display: inline;
            }
p       {color:green}
a       {color:red;
             background-color:white;
}
td,th      {background-color:lightgrey}
table,th,td    {
    border:1px solid black;
    border-collapse: collapse;}
th,td{padding: 15px;}

</style>
        </head>
    <body>
	<div id="wrap">
	    <div class="navbar navbar-default navbar-fixed-top" 
role="navigation">
		<div class="container">
		    <div class="navbar-header">
			    <a class="navbar-brand" href="../CS490/index.php">CS 
490</a>
		    </div>
		    <div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
			    <li class="active">
				<a 
href="http://web.njit.edu/~kl293/CS490/teacher.php">Teacher</a>
			    </li>
                            <li>
                                <a 
href="http://web.njit.edu/~kl293/CS490/create1.php">Create Quiz Questions</a>
                            </li>
                            <li>
                                <a 
href="http://web.njit.edu/~kl293/CS490/createQuiz.php">Make Quiz</a>
                            </li>
			    <li>
				<a 
href="http://web.njit.edu/~kl293/CS490/studentGrade.php">Grades</a>
			    </li>
			    <li>
				<a 
href="http://web.njit.edu/~kl293/CS490/Logout.php">LogOut</a>
			    </li>
			</ul>
		    </div>
		</div>
	    </div>
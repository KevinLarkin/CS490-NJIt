<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, 
initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<link rel="shortcut icon" 
href="../../docs-assets/ico/favicon.png"/>
	<title>Online Quiz</title>
	<link href="../css/bootstrap.css" rel="stylesheet"/>
	<link href="../css/mainstyle.css" rel="stylesheet"/>
	    <script type="text/javascript" 
src="http://code.jquery.com/jquery-1.11.0.js"></script>
	    <script src="../js/function.js"></script>
    </head>
    <body>
	<div id="wrap">
	    <div class="navbar navbar-default navbar-fixed-top" 
role="navigation">
		<div class="container">
		    <div class="navbar-header">
			<!--<button type="button" class="navbar-toggle" 
data-toggle="collapse" data-target=".navbar-collapse">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"/>
			    <span class="icon-bar"/>
			    <span class="icon-bar"/>-->
			</button>
			    <a class="navbar-brand" href="../CS490/index.php">CS 
490</a>
		    </div>
		    <div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
			    <li class="active">
				<a 
href="http://web.njit.edu/~kl293/CS490/student.php">Student</a>
			    </li>
                            <li>
                                <a 
href="http://web.njit.edu/~kl293/CS490/quizList.php">Take Quiz</a>
                            </li>
                            <li>
                                <a 
href="http://web.njit.edu/~kl293/CS490/getStudentGrade.php">Grade</a>
                            </li>
			    <li>
				<a 
href="http://web.njit.edu/~kl293/CS490/Logout.php">LogOut</a>
			    </li>
			</ul>
		    </div>
		</div>
	    </div>
	    <div class="container">

<!--subQuiz-->
   <?php 
    /*$Name = $_POST['quizname'];
    $MC = $_POST['multiplechoice'];
    $TF = $_POST['truefalse'];
    $OE = $_POST['openended'];
    
    $fields = json_encode(array('QuizName' => $Name, 'MultipleChoice' => $MC, 'TrueFalse' => $TF, 'OpenEnded' => $OE, 'FeedBack'=>'FeedBack'));
    //echo $fields;
    
    $crl = curl_init();
    //curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~ovl2/CS490/Back/grade.php");
    curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~rab25/CS490/Test/populate.php.php");
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $Qus);
    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);
    
    $outputDB = curl_exec($crl);
    curl_close($crl);*/
    
?>

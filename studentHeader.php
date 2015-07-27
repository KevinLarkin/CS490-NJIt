<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Online Quiz</title>
        <style> 
            li{
                display: inline;
            }
            body    {background-color:#00FF99}
            h1      {color:red}
            p       {color:green}
            td,th      {background-color:#FFCC66}
table,th,td    {
    border:1px solid black;
    border-collapse: collapse;}
th,td{padding: 10px;}
            
        </style>
    </head>
    <body>
        <div id="wrap">
            <div class="navbar navbar-default navbar-fixed-top" 
                 role="navigation">
                <div class="container">
                    <div class="navbar-header">
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
                /* $Name = $_POST['quizname'];
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
                  curl_close($crl); */
                ?>

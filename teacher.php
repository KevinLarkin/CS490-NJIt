<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['teacher']))header('Location: index.html');
    include('thead.php');
?>
        <div class="alert alert-success">
		    <h2>Welcome Professor!</h2>
	</div>
    </div>


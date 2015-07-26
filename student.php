<?php
     ob_start();
    session_start();
    if(!isset($_SESSION['student']))header('Location: index.html');
    include('studentHeader.php');
?>
        <div class="alert alert-success">
		    <b>Welcome Student!</b>
	</div>
    </div>


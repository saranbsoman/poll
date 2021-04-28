<?php
    echo "<h3><a href='logout.php'>Logout</a></h3>";
	session_destroy();
	unset($_SESSION['id']);
    echo "<script> location.href='index.php'; </script>";
	
    // include'logout.php';
	
?>
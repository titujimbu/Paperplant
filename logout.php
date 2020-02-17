<?php
	session_start();
	session_destroy();
	unset($_SESSION['em']);
	header("location:index.php");
?>
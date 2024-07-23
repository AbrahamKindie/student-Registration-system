<?php
include("DBConnection.php");
session_start();
	unset($_SESSION['user']);
	session_destroy();
	header("location:index.html");

?>
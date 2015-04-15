<?php
	session_start();
	unset($_SESSION["userid"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
	unset($_SESSION["admin"]);
	unset($_SESSION["username"]);
	header("Location: index.php?msg=Logged out");
?>
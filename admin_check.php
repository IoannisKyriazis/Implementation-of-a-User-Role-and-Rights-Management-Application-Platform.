<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	session_start();
	if(!isset($_SESSION['id_rolou']) || $_SESSION['id_rolou'] != "1")
	{
		echo "Επππ... που πας? Login έκανες Mr Admin???";
		exit;
	}
?>
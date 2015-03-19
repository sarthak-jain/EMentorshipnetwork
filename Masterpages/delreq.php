<?php 

	$mmid1=$_POST['cmd3'];
	$email=$_POST['cmd2'];
	$id=$_POST['cmdid'];
		require_once("myconfig.php");
	$r1=mysql_query("DELETE FROM `frndrqst` WHERE `from`='$mmid1'");
	
	
	
	header("Location: /masterpages/mentorp.php?test=$email&testvid=$id");
	
	
	
?>
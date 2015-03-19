<?php 

	$mmid1=$_POST['cmd1'];
	$email=$_POST['cmd'];
	$id=$_POST['cmdid'];
	$vid='00000';
	require_once("myconfig.php");
	$r=mysql_query("UPDATE `frndrqst` SET `status`='Y' WHERE `from`='$mmid1'");
	header("Location: /masterpages/mentorp.php?test=$email&testvid=$id");
	
	
	
	
	
	


?>
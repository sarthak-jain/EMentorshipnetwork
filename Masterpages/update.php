<?php 

	$mmid1=$_POST['cmd1'];
	$id=$_GET['test'];
	require_once("myconfig.php");
	$r=mysql_query("UPDATE `protdet` SET `confirmation`='Y' WHERE `mmid`='$mmid1'");

	header("Location: /masterpages/admin.php?test=$id");

?>
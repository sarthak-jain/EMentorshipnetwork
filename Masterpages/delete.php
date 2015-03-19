<?php 

	$mmid1=$_POST['cmd3'];
	$id=$_GET['test'];
		require_once("myconfig.php");
	$r1=mysql_query("DELETE FROM `protdet` WHERE `mmid`='$mmid1'");
	require_once("myconfig.php");
	$r2=mysql_query("DELETE FROM `auth` WHERE `mmid`='$mmid1'");
	if($r1 & $r2)
	{
	header("Location: /masterpages/admin.php?test=$id");
	}
	
	
	?>

// syntax and revision for other languages from my ementorship project-


<?php
	if(isset($_REQUEST['command1']) && ($_REQUEST['command1']=='ok1')){

	//command to include a file once
		require_once("myconfig.php");
		$email = $_REQUEST["recoverEmail"];
		
		//sql query
		
		$sql = "SELECT * FROM auth WHERE email = '$email'";
		// running sql query
		$resul1 = mysql_query($sql) or die(mysql_error());
			
		while($row = mysql_fetch_array($resul1)){
			$pw=$row['password'];
		}
		$pw1= substr($pw,0,5);
		$email1 = 'sarthak117@gmail.com';
		mysql_query("UPDATE `auth` SET `password`='$pw1' WHERE `email` ='$email'");
		$sub = 'your password has been reseted';
		$msg= "your new password is ".$pw1;	
		
		// mail function in php
		mail($email , $sub , $msg , 'From:' . $email1);	
		Header("Location: login.php");
	}
	
	// to printt
	echo 'to print';
	
	// starting session
	session_start();
	
	// content to write at start of file...
	
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/layout.css"/>
<link rel="stylesheet" type="text/css" href="css/content.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>My Mentor</title>
<script type="text/javascript" src="scripts/js/jquery.js"></script>
<script type="text/javascript">
...

</script>


<body>

<div id="header" style="height:75px;">
			<h2 class ="mainhead">ManipalMentorNet</h2>
		</div>
</body>
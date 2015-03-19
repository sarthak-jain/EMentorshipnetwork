<?php
	if(isset($_REQUEST['command1']) && ($_REQUEST['command1']=='ok1')){
	
		require_once("myconfig.php");
		$email = $_REQUEST["recoverEmail"];
		$sql = "SELECT * FROM auth WHERE email = '$email'";
		$resul1 = mysql_query($sql) or die(mysql_error());
			
		while($row = mysql_fetch_array($resul1)){
			$pw=$row['password'];
		}
		$pw1= substr($pw,0,5);
		$email1 = 'sarthak117@gmail.com';
		mysql_query("UPDATE `auth` SET `password`='$pw1' WHERE `email` ='$email'");
		$sub = 'your password has been reseted';
		$msg= "your new password is ".$pw1;	
		mail($email , $sub , $msg , 'From:' . $email1);	
		Header("Location: login.php");
	}
	if(isset($_POST['login']))
				{
					require_once("myconfig.php");
					$email = $_POST["username"];
					$pass = $_POST["password"];

					$vid='00000';
					$sql = "SELECT * FROM auth WHERE email = '$email' AND password = '$pass' ";
					$resul1 = mysql_query($sql) or die(mysql_error());
				
					while($row = mysql_fetch_array($resul1))
					{
						extract($row);
						if($row["email"]==$email && $row["password"]==$pass)
						{	
							$id=$row['mmid'];
							session_start();
							$_SESSION['email'] = $email;
							$_SESSION['password'] = $pass;
							$_SESSION['mmid'] = $mmid;
							if($row["acctype"]=='p')
							{
								header("Location: /masterpages/protegep.php?test=$email&messid=$vid");
							}
							else if($row["acctype"]=='m')
							{
								header("Location: /masterpages/mentorp.php?test=$email&testvid=$id&messid=$vid&testv=$vid");
							}
							else if($row["acctype"]=='a')
							{
								header("Location: /masterpages/admin.php?test=$id");
							}
						}
						else
						{
							echo 'sorry';
						}
					}
				}	

		

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


function check2(){
var f=document.recover;
if(f.recoverEmail.value==''){
alert('please enter your email id');
f.recoverEmail.focus();
return false;
}



f.command1.value='ok1';
f.submit();
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		
    // Checking for CSS 3D transformation support
    $.support.css3d = supportsCSS3D();

    var formContainer = $('#formContainer');

    // Listening for clicks on the ribbon links
    $('.flipLink').click(function(e){

        // Flipping the forms
        formContainer.toggleClass('flipped');

        // If there is no CSS3 3D support, simply
        // hide the login form (exposing the recover one)
        if(!$.support.css3d){
            $('#login').toggle();
        }
        e.preventDefault();
    });

    

    // A helper function that checks for the
    // support of the 3D CSS3 transformations.
    function supportsCSS3D() {
        var props = [
            'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
        ], testDom = document.createElement('a');

        for(var i=0; i<props.length; i++){
            if(props[i] in testDom.style){
                return true;
            }
        }

        return false;
    }
	
});


</script>
</head>

<body>
	<div id="container">
		<div id="header" style="height:75px;">
			<h2 class ="mainhead">ManipalMentorNet</h2>
		</div>
		<div id="main">
			<div id="llpprimary">
				<div id="formContainer">
					<div id="log">
					<form id="login" method="post" action="login.php">
						
							<div class="ribbon-wrapper-green">
								<div class="ribbon-green">
									<a href="#" id="flipToRecover" class="flipLink" >Forgot Password?</a>
								</div>
							</div>
						
						
						<h1 style="margin-top:30px;">Login Form</h1>
						<div id="mailid" class="mailid" style="top:10px;">
							<h3 class="cemail">E-mail Id:</h3>
							<input  class="s-featuring-textbox" type="text" name="username" id="username" placeholder="Enter email id here"/>	
						</div>
						<div id="passid" style="top:20px;">
							<h3 class="cpass">Password:</h3>
							<input 	class="s-featuring-textbox" type="password" name="password" id="password" placeholder="Enter Password here"/>
						</div>
						<div id="notifier" class="btngrp">
							<input type="submit" value="Sign In" name="login" class="butn" onclick="validate" />
							<h3 style="margin-left:150px; top:-37px;font-size:12px; "> OR </h3>
							<a href="register.php" style="margin-left:65%;font-size:20px;margin-top:-60px;color:#00b2ee;cursor:pointer;" name="register">Sign Up!</a>
						</div>
						<div id="social" style="margin-right:387px;">
				<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmymentormanipal%3Fskip_nax_wizard%3Dtrue&amp;send=false&amp;layout=button_count&amp;width=600&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:600px; height:21px;" allowTransparency="true"></iframe>
				<a href="https://twitter.com/sarthak117" class="twitter-follow-button" data-show-count="false">Follow @sarthak117</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
					</form>
					</div>
					<div id="forg">
					<form id="recover" name="recover" onsubmit="return check2()">
						
						<div class="ribbon-wrapper-green">
								<div class="ribbon-green">
									<a href="#" id="flipToLogin" class="flipLink" >Back</a>
								</div>
						</div>
						<input type="hidden" name="command1">
						<h1 style="margin-top:30px;">Recovery</h1>
						<h3 style="margin-top:50px;margin-left:20px;">Enter your e-mail id here we will send your new password.</h3>
						<div class="mailid" style="top:30px;">
							<h3 class="cemail">Email:</h3>
							<input class="s-featuring-textbox" type="text" name="recoverEmail" id="recoverEmail" placeholder="Enter your e-mail id here" />
						</div>
						<div class="btngrp" >
							<input type="submit" value="Get new password" name="recover" class="butn" onclick="return check2()"/>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
			
		
			
		
		<div id="footer">
			<div id="foot">
				<div id="footnotes">
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">About |</a>
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">Careers |</a>
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">Terms |</a>
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">Copyright Policy |</a>
				</div>
			</div>	
		</div>
	</div>
</body>

</html>
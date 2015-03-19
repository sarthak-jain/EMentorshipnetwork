<?php
		require("myconfig.php");
		$id = $_GET['test'];
		
		$sql2 = "SELECT * FROM addet WHERE `mmid` = '$id' ";
		$result2 = mysql_query($sql2) or die(mysql_error());
		$row2=mysql_fetch_assoc($result2);
		$deptname = $row2['deptname'];
		
		$sql = "SELECT * FROM protdet WHERE `confirmation` = 'n' AND `spec` = '$deptname'";
		$result = mysql_query($sql) or die(mysql_error());
		$ar1 = array();
					
		while($row=mysql_fetch_assoc($result)){
				$ar1[]=$row;
		}
		$c1=mysql_num_rows($result);
		
		$sql1 = "SELECT * FROM protdet WHERE `spec` = '$deptname'";
		$result1 = mysql_query($sql1) or die(mysql_error());
		$row1=mysql_fetch_assoc($result1);
		$p1 = mysql_num_rows($result1);
		
		$sql3 = "SELECT * FROM `mentdet` WHERE `spec` = '$deptname' ";
		$result3 = mysql_query($sql3) or die(mysql_error());
		$row3=mysql_fetch_assoc($result3);
		$m1 = mysql_num_rows($result3);	
				
		if(isset($_REQUEST['command1']) && ($_REQUEST['command1']=='ok1')){
	
			require_once("myconfig.php");
			$fn = $_REQUEST["fname"];
			$ln = $_REQUEST["lname"];
			$to = $_REQUEST["mentmail"];
			$sub = 'Join ManipalMentoringNetwork! Guide your Juniors for Placements';
			$msg= "Dear". $fn.''. $ln.", \nWe invite you to join MIT\'s Placement mentoring network in the capacity of a Mentor for your juniors. \n Please click on link below to register: \n http://www.needymanipal.com/sarthak/masterpages/MentorSignUp.php";
			$email = 'sarthak117@gmail.com';
			mail($to , $sub , $msg , 'From:' . $email);	
				
		}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/layout.css"/>
<link rel="stylesheet" type="text/css" href="css/content.css"/>
<link rel="stylesheet" type="text/css" href="css/shadow.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>ADMIN DASHBOARD</title>
<script type="text/javascript" src="scripts/js/jquery.js"></script>
<script type="text/javascript" >
function accprot()
{ 
	var f = document.form1;
	f.cmd.value='update';
	f.submit();
}
</script>
<script type="text/javascript" >
function delprot()
{ 
	var g = document.form2;
	g.cmd2.value='delete';
	g.submit();
}
</script>
<script type="text/javascript">


function checkmail(){
var f=document.mentoinvite;
if(f.fname.value==''){
alert('please enter your email id');
f.recoverEmail.focus();
return false;
}
if(f.lname.value==''){
alert('please enter your email id');
f.recoverEmail.focus();
return false;
}
if(f.mentmail.value==''){
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
		$('mentinv').hover(function(){
			$(this).css('background-color','blue');
		})
		$('#minvite').click(function() {
		
					//Getting the variable's value from a link 
					var loginBox = $(this).attr('onClick');

					//Fade in the Popup
					$(loginBox).fadeIn(300);
		
					//Set the center alignment padding + border see css style
					//var popMargTop = ($(loginBox).height() + 24) / 2; 
					//var popMargLeft = ($(loginBox).width() + 24) / 2; 
			
					//$(loginBox).css({ 
						//	'margin-top' : -popMargTop,
						//	'margin-left' : -popMargLeft
					//});
			
					// Add the mask to body
					$('body').append('<div id="mask"></div>');
					$('#mask').fadeIn(300);
		
					return false;
				})
				$('a.close, #mask').live('click', function() { 
					$('#mask , .login-popup').fadeOut(300 , function() {
					$('#mask').remove();  
					}); 
					return false;
				});
	});
</script>

</head>
<body style="background:url(images/backi.png) repeat scroll 0 0 #F5EFE6;">




	<div id="container">
		<div id="header">
			
			<h2 class ="mainhead">ManipalMentorNet</h2>
		
			<div id="footnotes">
				<a href="logout.php" style="text-decoration:none">Logout</a>
			</div>
		</div>
		<div id="main">
			<div id="right-sidebar">
				<div id="pendingreq">
					<h3 style="margin-left:5%;padding-bottom:10px;">Respond to <?php echo $c1;?> Pending Protege Confirmations</h3>
					<?php 
							
						
							
							
							
							for($i=0;$i<$c1;$i++){
							$fname1 = $ar1[$i]["fn"];
							$lname1 = $ar1[$i]["ln"];
							$spec = $ar1[$i]["spec"];
							$curyr1= $ar1[$i]["curryear"];
							$mmid= $ar1[$i]["mmid"];
							
								
							?>
					<div class="pendbox">
						<div id="pendid">
							<hr/>
							<div id="prot-info-top">
								<div id="prot-info-top-left">
										<img src="uploads/holder.png" height="65px" width="65px" alt=""/>
								</div>
								<div id="prot-info-top-mid">
									<h5 style="color:blue;"><?php echo $fname1.' '.$lname1; ?></h5>
									<h5><?php echo $spec; ?></h5>
									<h5><?php echo $curyr1; ?> Year</h5>
								</div>
								<div id="prot-info-top-right">
										<form action="update.php?test=<?php echo $id;?>" name="form1" method="POST">
							
											<input type="hidden" name="cmd" >
											<input type="hidden" name="cmd1" value="<?php echo $mmid; ?>" >									
											<input value="Confirm" name="yes"  class="pvalid7"  type="submit"  id="y" >
											
										</form>
										<form action="delete.php?test=<?php echo $id;?>" name="form2" method="POST">
											<input type="hidden" name="cmd2">
											<input type="hidden" name="cmd3" value="<?php echo $mmid; ?>">
											
											<input value="Ignore" name="no" id="noo" class="pvalid7" type="submit" id="n">
											
										</form>
								</div>
							</div>
						</div>
						
					</div>
					<?php } ?>
				</div>
			</div>
			<div id="left-sidebar">
				<div id="admin-content">
					<div id="admin-info">
						<div id="admin-info-top">
							<div id="admin-info-top-left">
								<img src="images/holder.png" height="65px" width="65px" alt=""/>
							</div>
							<div id="admin-info-top-right">
								<h3 style="margin-left:5px;margin-top:20px;">Dept. of <?php echo $deptname;?></h3>
							</div>
						</div>
						<div id="admin-info-bottom">
							<h3>Manipal Insitute Of Technology</h3>
						</div>
					</div>
					<div id="dept-info" class="dept-info">
							<div id="di1">
								<h3 style="margin-top:20px;margin-left:2px;">Department Information</h3>
							</div>
							<div id="di2">
								<h2 style="float:center; padding:0;"><?php echo $p1;?></h2>
								<h3 style="float:center">Proteges</h3>
							</div>
							<div id="di3">
								<h2 style="float:center; padding:0;"><?php echo $m1;?></h2>
								<h3 style="float:center;">Mentors</h3>
							</div>
					</div>
					<div id="mentinv" class="dept-info">
						<input type="submit" value ="Invite New Mentor" name="minvite" id="minvite" class="invbtn" onClick="#invite-box">
					</div>
			</div>
			
			</div>
				
			
		</div>
		<div id="footer">
			
				<div id="footnotes">
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">About |</a>
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">Careers |</a>
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">Terms |</a>
					<a href="file:///E:/FINAL%20SEM/Webpages/LandingPage/LandingPage.html">Copyright Policy |</a>
				</div>	
			
		</div>
		

		<div id="invite-box" class="login-popup">
				<h2>Enter Details :</h2>
					<form action="admin.php?test=<?php echo $id;?>" name="mentoinvite" method="post" id="invitation">
						<input type="hidden" name="command1">
						<div id="mailid">
							<h3 id="cemail">First Name:</h3>
							<input  class="s-featuring-textbox" type="text" name="fname" id="fname" placeholder="Enter first name here"/>	
						</div>
						<div id="mailid">
							<h3 id="cemail">Last Name:</h3>
							<input  class="s-featuring-textbox" type="text" name="lname" id="lname" placeholder="Enter last name here"/>	
						</div>
						<div id="mailid">
							<h3 id="cemail">E-mail Id:</h3>
							<input  class="s-featuring-textbox" type="text" name="mentmail" id="mentmail" placeholder="Enter email id here"/>	
						</div>

						<input type="submit" value="Send Invite" name="mentoinvite" class="btn" onclick="return checkmail()"/>
					</form>
		</div>
	</div>
</body>
</html>
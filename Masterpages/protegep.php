<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link href='http://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/content.css">
<link rel="stylesheet" type="text/css" href="css/shadow.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<title>MentorProfile</title>
<script type="text/javascript" src="scripts/js/jquery.js"></script>
<script type="text/javascript">
function messageshow() {
				
				$(".tabular").css("background-color","rgba(0,0,0,0.4)");
				$("#tmsg").css("background-color","#FFFFFF");
				$(".infoleaker").hide();
				$("#mmsg").show();
}
</script>
<script type="text/javascript">
function cvshow() {
    	$(".tabular").css("background-color","rgba(0,0,0,0.4)");
				$("#tcv").css("background-color","#FFFFFF");
				$(".infoleaker").hide();
				$("#mcv").show();
}
</script>

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
	$(document).ready(function(){
			$("#mmsg").hide();

			
			
			
			$("#tcv").css("background-color","#FFFFFF");
		
			/*$("#tmsg").click(function(){});*/
			
			/*$("#tcv").click(function(){});*/
			
			$('#breq').click(function() {
		
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
<body>
<?php
			require('myconfig.php');
			$email = $_GET['test'];
						if(isset($_GET['messid'])){
			$messid =$_GET['messid'];
			}
			$sql5 = "SELECT * FROM `auth` WHERE `email`= '$email' ";
			$result5 = mysql_query($sql5) or die(mysql_error());
			$row5 = mysql_fetch_array($result5);
			$id = $row5['mmid'];
			
			$sql6 = "SELECT * from `protdet` WHERE `mmid` = '$id'";
			$result6 = mysql_query($sql6) or die(mysql_error());
			
			while($row6 = mysql_fetch_array($result6))
			{
				
				$fn = $row6['fn'];
				$ln = $row6["ln"];
				$dob = $row6["dob"];
				$sex = $row6['sex'];
				$hometown = $row6["hometown"];
				$nationality = $row6["nationality"];
				$phone = $row6["phone"];
				$college = $row6["college"];
				$fos = $row6["fos"];
				$spec = $row6["spec"];
				$curryear = $row6["curryear"];
				$confirmation = $row6['confirmation'];
				$genderini;
				if($sex== 'male')
				{$genderini = 'He';}
				else{
					$genderini='She';
					}
				if($confirmation == 'N')
					{ header('Location: /masterpages/await.php?test=$email');}
			}	
			$sql7 = "SELECT * from `frndrqst` WHERE `from` = '$id' AND `status`='Y'";
			$result7 = mysql_query($sql7) or die(mysql_error());			
			$ar1 =array();
			$ar2 =array();
			$ar3 =array();
		
			while($row7 = mysql_fetch_array($result7))
			{	
				$to = $row7['to'];
				
				$sql8 = "SELECT * from `mentdet` WHERE `mmid` = '$to'";
				$result8 = mysql_query($sql8) or die(mysql_error());	
				$row8 = mysql_fetch_array($result8);
				$ar1[] = $row8;
			}
			$n = mysql_num_rows($result7);
				$messid=$_GET['messid'];
				if(isset($_GET['view'])){
				$sql9 = "SELECT * from `mess` WHERE `to` = '$messid'";
				$result9 = mysql_query($sql9) or die(mysql_error());	
				while($row9 = mysql_fetch_assoc($result9)){$ar2[] = $row9;}
				$n1 = mysql_num_rows($result9);
				$sql10 = "SELECT * from `mess` WHERE `from` = '$messid'";
				$result10 = mysql_query($sql10) or die(mysql_error());	
				while($row10 = mysql_fetch_assoc($result10)){$ar3[] = $row10;}
				$n2 = mysql_num_rows($result10);
				}
				
				if(isset($_POST['sendm']))
				{
				$to = $messid;
				$from = $id;
				$message = $_POST["messit"];
				$sql11 = "INSERT INTO `mess` (`to`, `from`,`message`) VALUES ('$to' ,'$from','$message')";
				$result11 = mysql_query($sql11) or die(mysql_error());
				
				}
				$filename;
		
		$path1='uploads/'.$id.'.jpg';
		$path2='uploads/prof.png';
		$filename= file_exists($path1) ? $path1 : $path2; 

		?>	
	<div id="container">
		<div id="header">
			<h2 class ="mainhead">ManipalMentorNet</h2>
			<div id="footnotes">
			<a href="search.php?prot=<?php echo $id;?>&test=<?php echo $email;?>" style="text-decoration:none;">Search</a>
			<a href="logout.php" style="text-decoration:none;">Logout</a>
			
			
			</div>
		</div>
		
		
		<div id="main">
			<div id="profcontent">
				<div id="profheadinfo">
					<div id="prof-info-top">
							<div id="prof-info-top-left">
								<a id="upload" href="my_file_prot.php?test=<?php echo $email;?>&id=<?php echo $id;?>">Upload Pic </a>
								<img id="profileimg" style="margin-top:5%;" src="<?php echo $filename;?>" height="198px" width="198px" alt="not found" />
							</div>
							<div id="prof-info-top-right">
								<h2 style="margin-left:35px;margin-top:30px;font-size:40px;color:white;"><?php echo $fn.' '.$ln;?></h2>
								<h3 style="color:white;">Manipal Insitute Of Technology</h3>
								
							</div>
					</div>
					<div id="prof-info-bottom">
						<div id="tabs">
						
							<a id="tcv" class="tabular" onclick="cvshow();">CV</a>
							<a id="tmsg" class="tabular" onclick="messageshow();">Messages</a>
							
						</div>	
					</div>
				</div>
				<div id="profinfoload">
					<div id="profinfoloadtop">
					
					</div>
					<div id="mcv" class="infoleaker">
							<h3 style="width:80%;padding:2px; font-size:20px;color:#54a6de;"><?php echo $fn.' '.$ln ;?></h3>	
							<h3 style="width:80%;padding:2px;margin-top:-5px;color:#54a6de;"><?php echo $dob ;?></h3>
							<h3 style="width:80%;padding:2px;margin-top:-5px;color:#54a6de;"><?php echo $nationality ;?></h3>
							<h3 style="width:80%;padding:2px;margin-top:-5px;color:#54a6de;"><?php echo '+91-'.$phone ;?></h3>
							
							<h2 style="width:80%;margin-top:25px;margin-left:110px;text-decoration:underline;font-size:15px;color:black;padding:2px;"><?php echo 'Education' ;?></h2>
									<ul>
										<li>
											<h3 style="width:100%;color:#54a6de;padding:2px;margin-top:-21px;margin-left:10px;"><?php echo $fos.'('.$spec.') in '.$curryear.' from '.$college ; ?></h3>
										</li>
									</ul>	
							
							
						</div>
					<div id="mmsg" class="infoleaker">
					
							<div id="messager">
								<div id="messlist">
									<?php
										
										for($i=0;$i<$n;$i++)
										{	
											$f = $ar1[$i]["fn"];
											$l = $ar1[$i]["ln"];
											$mid = $ar1[$i]["mmid"];
											 echo '<div id="fmname"><a style="padding-left:10px;margin-top:10px;"href="protegep.php?test='.$email.'&messid='.$mid.'&view=1">'.$f.' '.$l.'</a></div><hr/>';
										}
									?>
									
								</div>
								<div id="messviewer">
									<div id="messdet">
										<?php
											
											for($j=0,$k=0;$j<$n2;$k++,$j++)
											{	if($k<$n1){	
												?><h3 style="color:white;"><?php echo $ar2[$k]["message"];?></h3><?php
												echo '<br/>';}
												
												?><h3 style="color:blue;"><?php echo $ar3[$j]["message"];?></h3><?php
												echo '<br/>';
											}
											
										?>
									</div>
									<div id="messend">
										<form action="<?php echo 'protegep.php?test='.$email.'&messid='.$messid;?>" method="post" id="sendm">
											<textarea name="messit" id="messit">
												
											</textarea>
											<input type="submit" name="sendm" value="Send" style="margin-top:30px; width:15%; height:25px;"/>
											<h4 style="margin-top:-2px;">Your messages are in white!</h4>
										</form>
									</div>
								</div>
							</div>
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
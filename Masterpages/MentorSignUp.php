<?php
if(isset($_GET['stepper'])) {
$stepper = $_GET['stepper'];
}
?>
<?php
	function mmidgen(){
		$r = rand(0,999999);
		$arr = array();
		$sqlr = "SELECT * FROM `auth`";
		$resultr = mysql_query($sqlr) or die(mysql_error());
		while($rowr = mysql_fetch_array($resultr)){$arr[]=$rowr;}
		$nn=mysql_num_rows($resultr);
		for($q=0;$q<$nn;$q++)
		{
			if($r == $arr[$q]["mmid"])
			{
				mmidgen();
			}
		}
		$newmmid=$r;
		return $newmmid;
	}
?>
<?php
	require('myconfig.php');
	
	if(isset($_POST['bvalid']))
	{
		
		$fn = mysql_real_escape_string($_POST['fn']);
		$ln = mysql_real_escape_string($_POST['ln']);
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['pass']);
		$cpass = mysql_real_escape_string($_POST['cpass']);
		$mmid = mmidgen();
		if($pass == $cpass)
		{
			$sql1 = "INSERT INTO `auth` (`mmid`,`email`, `password`,`acctype`) VALUES ('$mmid' ,'$email' ,'$pass','m')";
			$result1 = mysql_query($sql1) or die(mysql_error());
			$sql2 = "INSERT INTO `mentdet` (`mmid`, `fn`, `ln`) VALUES ('$mmid' ,'$fn','$ln')";
			$result2 = mysql_query($sql2) or die(mysql_error());
			Header("Location: MentorSignUp.php?stepper=2&n=$fn&test=$email");
		}
		else
		{
			echo 'Sorry Your Passwords Dont Match';
		}
	}
	if(isset($_POST['bpers']))
	{
		$day = mysql_real_escape_string($_POST['day']);
		$month = mysql_real_escape_string($_POST['month']);
		$year = mysql_real_escape_string($_POST['year']);
		$hometown = mysql_real_escape_string($_POST['hometown']);
		$nationality = mysql_real_escape_string($_POST['nationality']);
		$sex = mysql_real_escape_string($_POST['sex']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$dob = $year.'-'.$month.'-'.$day;
		$fn1 = $_POST['fn1'];
		$email1 = $_POST['email1'];
		$sql3 = "UPDATE `mentdet` SET `dob`='$dob' , `hometown`= '$hometown', `nationality`= '$nationality', `sex`= '$sex', `phone`='$phone' WHERE `fn` ='$fn1'";
		$result3 = mysql_query($sql3) or die(mysql_error());
		
		if($result3)
		{
			Header("Location: MentorSignUp.php?stepper=3&n=$fn1&test=$email1");
		}
		else 
		{
			echo 'sorry';
		}
		
	}
	if(isset($_POST['bpro']))
	{
		$college =mysql_real_escape_string($_POST['college']);
		$fos =mysql_real_escape_string($_POST['fos']);
		$spec =mysql_real_escape_string($_POST['spec']);
		$gradyear =mysql_real_escape_string($_POST['gradyear']);
		$company =mysql_real_escape_string($_POST['company']);
		$designation =mysql_real_escape_string($_POST['designation']);
		$currcity =mysql_real_escape_string($_POST['currcity']);
		$placement =mysql_real_escape_string($_POST['placement']);
				
		$fn1 = $_POST['fn2'];
		$email1 = $_POST['email2'];	
		$sql4 = "UPDATE `mentdet` SET `fos` ='$fos', `spec` ='$spec', `college` ='$college', `gradyear` ='$gradyear', `company`='$company', `designation`='$designation', `currcity`='$currcity', `placement`='$placement' WHERE `fn` = '$fn1'";
		$result4 = mysql_query($sql4) or die(mysql_error());
		
		if($result4)
		{
			Header("Location: MentorSignUp.php?stepper=4&n=$fn1&test=$email1");
		}
		else
		{
			echo 'sorry';
		}
				
	}
	if(isset($_POST['badmcnfrm']))
	{
		$email =$_POST['email3'];
		Header("Location: /masterpages/login.php");
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
<title>MentorSignUp</title>
<script type="text/javascript" src="scripts/js/jquery.js"></script>

</head>
<body>
	<div id="container">
		<div id="header">
			<h2 class ="mainhead">ManipalMentorNet</h2>
		</div>
		<div id="main">
				<div id="suprimary">
					<div id="pheadnote">
						<h2>Help more Students reach where you are. We thank you for your efforts. Please fill in your details to create your own Mentor account .  </h2>
					
					</div>
					<div id="pprognote">
						
						<div id="tvalid" <?php if(!isset($stepper)) { echo 'style="background-color:green" '; } ?> class="progbox"><h3>Validation Info</h3></div>
						<div id="tpers" <?php if((isset($stepper)) && ($stepper==2)) { echo 'style="background-color:green" '; } ?> class="progbox"><h3>Personal Info</h3></div>
						<div id="tpro" <?php if(isset($stepper) && $stepper==3) { echo 'style="background-color:green" '; } ?> class="progbox"><h3>Professional Info</h3></div>
						<div id="tment" <?php if(isset($stepper) && $stepper==4) { echo 'style="background-color:green" '; } ?> class="progbox"><h3>You are a Mentor</h3></div>
					</div>
					<div id="pinfonote">
					<?php
					if(!isset($_GET['stepper']))
					{
						echo'
						<div id="pvalidinfo" class="infoleak">
							<form action="MentorSignUp.php" method="post">
								<div id="pfn" class="msui">
									<h4>First Name:</h4>
									<input class="su-featuring-textbox" name="fn" type="text" placeholder="Enter First Name here"/>
								</div>
								<div id="pln" class="msui">
									<h4>Last Name:</h4>
									<input class="su-featuring-textbox" type="text" name="ln" placeholder="Enter Last Name here"/>
								</div>
								<div id="peid" class="msui">
									<h4>E-mail Id:</h4>
									<input class="su-featuring-textbox" type="text" name="email" placeholder="Enter E-mail Id here"/>
								</div>
								<div id="ppwd" class="msui">
									<h4>Password:</h4>
									<input class="su-featuring-textbox" type="password" name="pass" placeholder="Enter Password here"/>
								</div>
								<div id="pcpwd" class="msui">
									<h4>Confirm Password:</h4>
									<input class="su-featuring-textbox" type="password" name="cpass" placeholder="Re-Enter Password here"/>
								</div>
							<input type="submit" value="Done" class="subtn" id="bvalid" name="bvalid"/>
							</form>
							
						</div>' ;
					}
					else
					{
						$stepper = $_GET['stepper'];
						
						if($stepper==2)
						{
						$name = $_GET['n']; 
						$email = $_GET['test'];
						echo'
						<div id="pperinfo" class="infoleak">
							<form action="MentorSignUp.php" method="post">
								<input type="hidden" name="fn1" value="'. $name .'">
								<input type="hidden" name="email1" value="'. $email .'">
							<div id="phifln" class="msui">
								<h2 style="margin-left:4%;">Hi, '.$name.' !</h2>
								
							</div>
							
								<div id="pdob" class="msui">
									<h4>Date of Birth:</h4>
									<div id="datepicker" class="date">
										<select class="s-featuring-date" name="day">
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>
										<select class="s-featuring-date" name="month">
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
										<select class="s-featuring-date" name="year">
											<option value="1983">1983</option>
											<option value="1984">1984</option>
											<option value="1985">1985</option>
											<option value="1986">1986</option>
											<option value="1987">1987</option>
											<option value="1988">1988</option>
											<option value="1989">1989</option>
											<option value="1990">1990</option>
											<option value="1991">1991</option>
											<option value="1992">1992</option>
											<option value="1993">1993</option>
											<option value="1994">1994</option>
	
										</select>
									</div>
								</div>
								
								<div id="phtwn" class="msui">
									<h4>Hometown:</h4>
									<div class="dates">
									<select class="s-featuring-date" name="hometown">
											<option value="indore">Indore</option>
											<option value="manipal">Manipal</option>
											<option value="delhi">Delhi</option>	
											<option value="mumbai">Mumbai</option>
											<option value="chennai">Chennai</option>
											<option value="bangalore">Bangalore</option>
											<option value="jaipur">Jaipur</option>
											<option value="dehradun">Dehradun</option>
											<option value="shimla">Shimla</option>
											<option value="hyderabad">Hyderabad</option>
											<option value="patna">Patna</option>
											<option value="ahmedabad">Ahmedabad</option>
	
									</select>
									</div>
								</div>
								<div id="pnat" class="msui">
									<h4>Nationality:</h4>
									<div class="dates">
									<select class="s-featuring-date" name="nationality">
											<option value="indian">Indian</option>
											
									</select>
								</div>
								<div id="psex" class="msui">
									<h4>Sex:</h4>
									<div class="dates">
									<select class="s-featuring-date" name="sex">
											<option value="male">Male</option>
											<option value="female">Female</option>
										
									</select>
									</div>
								</div>
								<div id="pphnno" class="msui">
									<h4>Phone Number:</h4>
									<input class="s-featuring-textbox" type="text" name="phone" placeholder="Enter Phone Number here"/>
								</div>
							<input type="submit" class="subtn" value="Done" id="bpers" name="bpers"/>
							</form>
							
						</div>';
						}
						else if($stepper==3)
						{
							$name = $_GET['n']; 
							$email = $_GET['test']; 
							echo'
						<div id="pproinfo" class="infoleak">
							<form action="MentorSignUp.php" method="post">
									<input type="hidden" name="fn2" value="'. $name .'">
									<input type="hidden" name="email2" value="'. $email .'">
							<div id="ppronote" class="msui">
								<h2 style="margin-left:4%;">'.$name.' , Please tell us about your professional life !</h2>
								
							</div>
							
								<div id="palma" class="msui">
									<h4>Alma-Mater:</h4>
									<div class="dates">
											<select class="s-featuring-date" name="college">
												
												<option value="MIT">MIT</option>
											</select>
										</div>
								</div>
								
								<div id="pfldstudy" class="msui">
									<h4>Field of Study:</h4>
									<div class="dates">
											<select class="s-featuring-date" name="fos">
												<option value="be">BE</option>
												<option value="mtech">M.Tech</option>
												<option value="mca">MCA</option>
											</select>
										</div>
								</div>
								<div id="pspecstudy" class="msui">
									<h4>Specialisation:</h4>
									<div class="dates">
										<select class="s-featuring-date" name="spec">
												<option value="Civil">Civil</option>
												<option value="Electronics and Communication">EnC</option>
												<option value="Information and Communication Technology">IT</option>
												<option value="Computer Science">CS</option>
												<option value="Mechanical">Mechanical</option>
										</select>
									</div>
								</div>
								<div id="pyeargrad" class="msui">
									<h4>Year of Graduation:</h4>
									<div class="dates">
										<select class="s-featuring-date" name="gradyear">
												<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
										</select>
									</div>
								</div>
								<div id="pcomp" class="msui">
									<h4>Current Company:</h4>
									
									<input class="s-featuring-textbox" type="text" name="company" placeholder="Enter Company here"/>
								</div>
								<div id="pdesig" class="msui">
									<h4>Designation:</h4>
									<input class="s-featuring-textbox" type="text" name="designation" placeholder="Enter Designation here"/>
								</div>
								<div id="pprocity" class="msui">
									<h4>Current City:</h4>
									<input class="s-featuring-textbox" type="text" name="currcity" placeholder="Enter Current City here"/>
								</div>
								<div id="pplacesrc" class="msui">
									<h4>How were you Placed?</h4>
									<div class="dates">
										<select class="s-featuring-date" name="placement">
												<option value="on">On-Campus</option>
												<option value="off">Off-Campus</option>
												
										</select>
									</div>
								</div>
							<input type="submit" class="btn" id="bpro" value="Done" name="bpro"/>
							</form>
							
						</div>;';
						}
						else if($stepper==4)
						{	$email = $_GET['test']; 
							echo'
						<div id="pcomplete" class="infoleak">
							<form action="login.php" method="post">
							<input type="hidden" name="email3" value="'. $email .'">
							<h3>Congrats ! Please login to continue</h3>
							<input type="submit" class="subtn" id="bment" value="Done" name="bment"/>
							</form>
						</div>';
						}
					}
				?>
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
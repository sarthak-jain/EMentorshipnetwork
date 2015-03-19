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

</head>
<body style="background:url(images/backi.png) repeat scroll 0 0 #F5EFE6;">
<?php
require('myconfig.php');
		$c1=0;
		$vid='00000';
	if(isset($_GET['test'])){
		$email=$_GET['test'];
		$protid=$_GET['prot'];
		}
		if(isset($_POST['findment'])){
		$key=$_POST['keyword'];
		$email=$_POST['email'];
		$protid=$_POST['prot'];
        								
								/*$sql1 = "SELECT * FROM `mentdet` WHERE `spec` = '$key' OR `company` = '$key' ";*/
			$sql1 = "SELECT * FROM `mentdet` WHERE `company` LIKE '%$key%' OR `spec` LIKE '%$key%'"; 
			$result1 = mysql_query($sql1) or die(mysql_error());
			while($row1=mysql_fetch_assoc($result1)){
					$ar1[]=$row1;
			}
			$c1=mysql_num_rows($result1);
		}			
		
?>

	<div id="container">
		<div id="header" style="height:75px;">
			<h2 class ="mainhead">ManipalMentorNet</h2>
			<div id="footnotes">
				<a href="protegep.php?test=<?php echo $email; ?>" style="text-decoration:none;">Home</a>
			</div>
		</div>
		<div id="main">
			<div id="searchbar">
				<form name ="search" action="search.php" method="post"> 
					<input type="hidden" value="<?php echo $email;?>" name="email"/>
					<input type="hidden" value="<?php echo $protid;?>" name="prot"/>
					<input id="keyword" class="searchy" type="text" name="keyword" placeholder="Enter Dept. Name or Company Name to search for mentor.."/>
					<input type="submit" name="findment"  id="findment" value="Search"/>
				</form>
			</div>
			<div id="right-sidebar">
				<div id="pendingreq">
					<h3 style="margin-left:5%;padding-bottom:10px;"><?php echo $c1?> Mentors found...</h3>
					<?php 
							

							
							
							
							for($i=0;$i<$c1;$i++){
							$fname1 = $ar1[$i]["fn"];
							$lname1 = $ar1[$i]["ln"];
							$spec = $ar1[$i]["spec"];
							$curyr1= $ar1[$i]["gradyear"];
							$mmid= $ar1[$i]["mmid"];
								
								$sql2 = "SELECT * FROM `auth` WHERE `mmid` = $mmid ";
								$result2 = mysql_query($sql2) or die(mysql_error());
								$row2=mysql_fetch_assoc($result2);
								$passit = $row2['email'];
								
					?>
					<div class="pendbox">
						<div id="pendid">
							<hr/>
							<div id="prot-info-top">
								<div id="prot-info-top-left">
										<img src="images/holder.png" height="65px" width="65px" alt=""/>
								</div>
								<div id="prot-info-top-mid">
									<a href="mentorp.php?test=<?php echo $passit;?>&testv=<?php echo $email;?>&testvid=<?php echo $protid;?>&messid=<?php echo $vid;?>" style="color:blue;"><?php echo $fname1.' '.$lname1; ?></a>
									<h5><?php echo $spec; ?></h5>
									<h5><?php echo $curyr1; ?> Year</h5>
								</div>
								
							</div>
						</div>
						
					</div>
					<?php } ?>
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
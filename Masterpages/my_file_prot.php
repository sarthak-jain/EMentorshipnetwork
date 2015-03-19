<?php 
$email= $_GET['test'];
$id = $_GET['id'];
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
<body style="background:url(images/backi.png) repeat scroll 0 0 #F5EFE6;">
	<div id="container">
		<div id="header" style="height:75px;">
			<h2 class ="mainhead">ManipalMentorNet</h2>
		</div>
		<div id="main">
				<form enctype="multipart/form-data" method="post" action="image_upload_script_prot.php?test=<?php echo $email?>&id=<?php echo $id ?>">
					Choose your file here:

					<input name="uploaded_file" type="file"/><br /><br />
					<input type="submit" value="Upload It"/>
				</form>
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
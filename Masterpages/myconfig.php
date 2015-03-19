<?php
$con = mysql_connect("localhost","root", "");
if(! $con)
{
	die('Connection Failed'.mysql_error());
}
mysql_select_db("mymentor",$con);

?>
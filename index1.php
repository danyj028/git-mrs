<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>MemberZone Login</title>
		<meta name="author" content="root" >
		<meta name="generator" content="Bluefish 2.2.3" >
		<meta name="description" content="" >
		<meta name="keywords" content="AOSD Management" >
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
		<meta http-equiv="Content-Script-Type" content="text/javascript" >
		<meta http-equiv="Content-Style-Type" content="text/css" >
		<link rel="stylesheet" href="elt_css/elt_01.css" type="text/css">
		
	</head>
	<!--body style="background-color: rgb(233, 251, 255);"-->
	<body>
<script language="javascript" type="text/javascript">
<!--
if (document.images)
{
login_up = new Image;
login_up2 = new Image;
login_dn = new Image;
login_up.src = "/mrs/elt_img/elt_login_1.png";
login_up2.src = "/mrs/elt_img/elt_login_1b.png";
login_dn.src = "/mrs/elt_img/elt_login_1.png"; 
}
-->

function search_d()
{
	//alert("In Development");
	location.href=("mz_dir_search.php");
}
</script>

<?php

//include "./inc/el_sys_menu.php";
//$m = new el_sys_menu;

$title_string = "Australian Open Source Directory";
include "./inc/mz_header.php";

$h = new mz_header;

$h->h_logo = "t";
$h->h_return="f";
$h->h_home="f";
$h->h_username="Unknown Guest";
// $h->h_title = "<font size=\"+1\">MemberZone : Membership Management</font>";
//$h->h_title = "<img src=\"/mzone/elt_img/mzone_01_30.png\" width=\"120\"  alt=\"Membership Management\" align=\"left\">";
$h->h_title = "<div style=\"font-size:1.3em;color:#79A0F5;background:#ffffff;padding:8px;border-radius:15px 15px;border:2px solid;\">$title_string</div>";
$h->h_date_time = "t";
$h->h_display();


print <<< endprint

<div>
<table>
<tr><td valign="top" 
    style="
	width: 98%;
	
	text-align:left; 
	padding-left: 10pt;
	padding-bottom: 10pt;
	padding-top: 25pt;
	margin-right:30pt;
	border-top-width: 1;
	border-left-width: 0.5;
	border-bottom-width: 1;
	border-right-width: 1;
	border-top-style: none;
	border-left-style: none;
	border-bottom-style: solid;
	border-right-style: solid;
	border-color: #cc0000;	
	border-radius:12px;
	background-color: #FFFFFF;
	font-size:1.0em;
	
	
">
The Australian Open Source Directory contains a list of business who provide services for and based on Open Source software.
<p>OSIA Member business have priority listing. Non-Member business are also able to join and be listed.  To list business
products and services, please <a href="mz_register.php">register</a>.
<p>
Business and organisations looking for services for open source software, or seeking  more information about open source software
can search the directory.
<p>
<input type="button" name="search_d" value="Search Directory"
 style="font-size:15px;font-weight:bold;background-color:#F9c338;padding:8px;border-radius:5px;" onclick="javascript:search_d()">

<!--/div-->
</td>
<td>
</td>
</table>
<div style="text-align:left;margin-left:30px">
<a href="login.php">Member Login</a><br>
<a href="mailto:admin@osia.com.au">Contact OSIA</a>
</div>

endprint;

?>

<div style="font-size:0.8em;">
<br>	
This system is in beta status.	
</div>
</body>
</html>

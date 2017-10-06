<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>AOSD: Registration</title>
   <link rel="stylesheet" href="elt_css/elt_01.css" type="text/css">
</head>
<html>
<body>

<style>
p.c1
{
  font-size:0.9em;
  margin-top: 0.8em;
}
</style>

<font color="#000055">
<!--div style="background-color : #2E2ECA; color : #ffffff; font-size :10px; height : 10px; position : relative; text-align : center; top : -5px; vertical-align : middle; word-spacing : 15px;">
		
		<a href=info/tk_faq.html style="color:#ffffff;">Help</a>
		</div>
 <table width="100%" cellpadding="1" cellspacing="1" border="0" style="text-align: center;">
        <tbody>
          <tr>
			<td>
			<td width="33%"">
		<IMG src="elt_img/member_reg_15.png"  width="150px" align="center" border="0" alt="Member Registration"></td>
		<td style="font-size:16pt;font-weight: bold; color:#000055;">Conditions for listing on directory</td>
			</span>
		<td style="vertical-align: top; text-align: right;"><img  src="elt_img/mzone_01_12.png" alt="MZone">
			</td>
          </tr>
        </tbody>
      </table>
<hr-->
<?php
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

?>
<div style="background-color : #2E2ECA; color : #ffffff; font-size : 14px; padding:5px; text-align:left">Dear Prospective Member, please read and agree to the following conditions before your registration can be accepted.
&nbsp;&nbsp;&nbsp;&nbsp;<INPUT type="button" name="agree" value="I Agree" style="background-color : #D7E3F4; color : #000055; height:20px; font-size:8px;" onclick=document.form1.submit()>&nbsp;&nbsp;
<INPUT type="button" name="agree" value="Cancel" style="background-color : #D7E3F4; color : #000055;height:20px; font-size:8px;"  onclick=history.go(-2);>
</div>
<div style="margin-left:30px; margin-right:30px; color:#000055; text-align:justify;background-color : #d7e3f4;padding-left:20px;padding-right:20px; padding-top:5px;">
 <span style="font-size:1.2em;font-weight:bold;">Conditions for registration.</span>
   <p><span style="font-weight:bold;">In registering for listing on the Australian Open Source Directory you hereby agree to the following:</span> </p>
   <p></p>
   <p class=c1>1. Registration only allows you to have a profile on the directory and does not constitute registration as a Member of OSIA.</p>
   <p class=c1>2. You agree that your products and services listed on the directory are based on or targetted to Open Source software.</p>
   <p class=c1>3. You are wholly responsible for the accuracy and correctness of the information you provide on the directory.</p>
   <p class=c1>4. OSIA will not be held liable for any damage or loss to you or to anyone else, that may occur as a consequence of you listing your product and and services on the directory.</p>
   <p class=c1>5. OSIA reserves the right to suspend or cancel your listing at any time.</p>
   <p class=c1>6. You will pay any periodic fee that may be set by OSIA at anytime for your listing to appear.</p>
   <p class=c1>7. If your listing is cancelled by OSIA, you may be entitled to a partial refund of any fee paid.</p>
   <p class=c1>8. In order to avoid preferencing any business during searches, except for preferencing OSIA members over non-members, listings will show search results in random order when more than one record match the search, with OSIA member business being listed before non-members.</p>
   <p class=c1>9. OSIA reserves the right to suspend or end this directory service at any time.</p>
   <p class=c1>10. You may cancel your profile at anytime. 
   <p class=c1>11. OSIA reserves the right to change the conditions set on this page at any time and will provide at least 30 days notification of any change.</p>	
	<br>
    
  </div>

Please note:<p>
<ul>
<li>Your profile will be checked before it becomes visible on searches.  This is because, as registration is open to anyone, it is important to
verify that content posted is appropriate.</li>
<li>Registration for OSIA Membership is a separate process. Please visit the <a href="http://www.osia.com.au">OSIA website</a> for membership info.</li>
</ul>

<div align="center">
<hr>
<INPUT type="button" name="agree" value="I Agree" style="background-color : #D7E3F4; color : #000055" onclick=document.form1.submit();>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT type="button" name="agree" value="Cancel" style="background-color : #D7E3F4; color : #000055;" onclick=history.go(-2);>
</div>

<?php

$w_ref_tag = "";
if (isset($_REQUEST["x_ref"]))
{
	$w_ref = urldecode(($_REQUEST["x_ref"]));
	$w_ref_tag = "<input type=\"hidden\" name=\"x_ref\" value=\"$w_ref\">";
}

//if (isset($REQUEST["x_fname"]))
{
	$w_orgname = urldecode($_REQUEST["x_orgname"]);
$w_fname = urldecode($_REQUEST["x_fname"]);
//$w_oname = trim(urldecode($_REQUEST["x_oname"]));
$w_surname = urldecode($_REQUEST["x_surname"]);
//$w_dob = urldecode($_REQUEST["x_dob"]);
$w_phone = urldecode($_REQUEST["x_phone"]);
$w_mphone = urldecode($_REQUEST["x_mphone"]);
$w_email_add = urldecode($_REQUEST["x_email_add"]);
$w_addr_1= urldecode($_REQUEST["x_addr_1"]);
$w_addr_2 = urldecode($_REQUEST["x_addr_2"]);
$w_suburb = urldecode($_REQUEST["x_suburb"]);
$w_pcode = urldecode($_REQUEST["x_pcode"]);
$w_state = urldecode($_REQUEST["x_state"]);
$w_country = urldecode($_REQUEST["x_country"]);
$w_sec_name = urldecode($_REQUEST["x_second_name"]);
$w_sec_phone = urldecode($_REQUEST["x_second_phone"]);
$w_login_name = urldecode($_REQUEST["x_login_name"]);
$w_pword = urldecode($_REQUEST["x_pword1"]);
$w_find_us = urldecode($_REQUEST["x_find_us"]);
$w_reference = urldecode($_REQUEST["x_reference"]); 

$w_spec_off = 0;
if (isset($_REQUEST["x_spec_off"]))
{
	$w_spec_off = urldecode($_REQUEST["x_spec_off"]);
}


print <<< endprint

	<form name="form1" action="mz_register_agree.php" method="post" enctype="application/x-www-form-urlencoded">

	<input type="hidden" name="x_orgname" value="$w_orgname">
	<input type="hidden" name="x_fname" value="$w_fname">
	<!--input type="hidden" name="x_oname" value="\$w_oname"-->
	<input type="hidden" name="x_surname" value="$w_surname">
	<!--input type="hidden" name="x_dob" value="\$w_dob"-->
	<input type="hidden" name="x_phone" value="$w_phone">
	<input type="hidden" name="x_mphone" value="$w_mphone">
	<input type="hidden" name="x_email_add" value="$w_email_add">
	<input type="hidden" name="x_addr_1" value="$w_addr_1">
	<input type="hidden" name="x_addr_2" value="$w_addr_2">
	<input type="hidden" name="x_suburb" value="$w_suburb">
	<input type="hidden" name="x_pcode" value="$w_pcode">
	<input type="hidden" name="x_state" value="$w_state">
	<input type="hidden" name="x_country" value="$w_country">
	<input type="hidden" name="x_sec_name" value="$w_sec_name">
	<input type="hidden" name="x_sec_phone" value="$w_sec_phone">
	<input type="hidden" name="x_login_name" value="$w_login_name">
	<input type="hidden" name="x_pword" value="$w_pword">
	<input type="hidden" name="x_find_us" value="$w_find_us">
	<!--input type="hidden" name="x_spec_off" value="$w_spec_off"-->
	<input type="hidden" name="x_reference" value="$w_reference">

	</form>

endprint;
}


?>
</body>
</html>

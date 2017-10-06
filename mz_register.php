<?php

$w_ref_tag = $w_ref = "";
if (isset($_GET["x_reference"]))
{
	$w_ref = urldecode($_GET["x_reference"]);
	$w_ref_tag = "<input type=\"hidden\" name=\"x_ref\" value=\"$w_ref\">";
}

print <<< endprint

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>AOSD Registration</title>
  <link rel="stylesheet" href="elt_css/elt_01.css" type="text/css">
</head>

<script type="text/javascript" src="inc/elt_ajax_f_01.js"></script>

<script language="javascript">

var w_error = 0;
var elt_object = new ajax_request();

function check_dob()
{
	/*mm = document.form1.x_dob_m.value;
	dd = document.form1.x_dob_d.value;
	yyyy = document.form1.x_dob_y.value;
	
	document.form1.x_dob.value = yyyy+"/"+mm+"/"+dd;
	
   var d = new Date(mm + "/" + dd + "/" + yyyy);
   return d.getMonth() + 1 == mm && d.getDate() == dd && d.getFullYear() == yyyy;
   */

}

function check_login_name(l_name)
{
	
	w_url = "inc/elt_check_login_name.php?x_login_name="+l_name;
	elt_object.open("GET", w_url, true);
	
	elt_object.onreadystatechange = elt_response;
	elt_object.send(null);

}

function elt_response()
{

	w_error = 0;
	if (elt_object.readyState == 4)
	{
		if (elt_object.status == 200)
		{
			var elt_response_data = elt_object.responseText;
			
			if (elt_response_data == "error-1")
			{
				alert ("Login name is already being used.  Please choose a new one.");
				w_error  = 1;
			}
			else
			{	
				document.form1.submit();   //Submitting data
			}
		}
		else
		{
			document.getElementById('id1').innerHTML="HTTP Error encountered.";
		}
	}
}
	

function elt_register()
{

	if (document.form1.x_fname.value == "")
{
		alert ("Please enter your first name.");
}
	else
{
		if (document.form1.x_surname.value == "")
{
			alert ("Please enter your surname.");
}
		else
		{
						
{
			if (document.form1.x_email_add.value == "")
{
				alert ("Please enter your email address.");
}
			else
{
	if ((document.form1.x_addr_1.value == "")||(document.form1.x_country.value == "")||(document.form1.x_suburb.value == ""))
			{
				alert ("Please specify at least Address Line 1, City and Country.");
			}
			else
			{
				if (document.form1.x_login_name.value == "")
			{
				alert ("Please choose a Login Name.");
			}
			else
			{
				if ((document.form1.x_pword1.value == "")||(!(document.form1.x_pword1.value ==document.form1.x_pword2.value))||(document.form1.x_pword1.value.length<6))
				{
					alert ("Password is invalid or does not match. Please verify.");
					document.form1.x_pword1.value = "";
					document.form1.x_pword2.value = "";
				}
				else
{

				//check_login_name(document.form1.x_login_name.value);
				
				/*if (w_error == 0) */
				{
					// alert("Continue.");
					document.form1.submit();
					// alert("here");
				}
				
} 	}	}	}	}	} } }

function set_login_name()
{
	document.getElementsByName("x_login_name")[0].value = document.getElementsByName("x_email_add")[0].value;
	document.form1.x_login_name_show.value = document.form1.x_email_add.value;
	document.form1.x_login_name.value = document.form1.x_email_add.value;
	//alert(document.form1.x_login_name.value);
	alert("Pleae note: Your Login Name below has been set to your Email Address.");
}


</script>

endprint;

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

<body bgcolor="#ffffff">
<font color="#000055">
<!--div style="background-color : #2E2ECA; color : #ffffff; font-size :10px; height : 10px; position : relative; text-align : center; top : -5px; vertical-align : middle; word-spacing : 15px;">
		<a href=javascript:history.back() style="color:#ffffff;">Home</a>
		<a href=info/mz_faq.html style="color:#ffffff;">Help</a>
		</div-->
 <!--table width="100%" cellpadding="1" cellspacing="1" border="0" style="text-align: center;margin-top:-5px;">
        <tbody>
          <tr>
			<td width=33%><span style="font-size:12pt;font-weight: bold; color:#005500;">
		<IMG src="elt_img/member_reg_15.png" width="150px" align="center" border="0" alt="New Rgistration"></span>
			</td>
		<td style="vertical-align: top; text-align: right;"><img  src="elt_img/mzone_01_12.png" width="150" style="border: 0px solid ;" alt="MemberZone">
			</td>
          </tr>
        </tbody>
      </table-->
<hr style="position:relative;top:-0.5em">
<!--#ff7508 #B5D5BD-->
<FORM name="form1" action="mz_register_cont.php" method="post" enctype="application/x-www-form-urlencoded">
	$w_ref_tag
    <table width="98%" align="center" bgcolor="#D7E3F4" cellpadding="3" style="font-size: 12px;margin-top:-1em;">
   <tbody>
	<tr><TD colspan=4>
		<div style="background-color: #2E2ECA;  color : #ffffff; font-size : 12px; padding:2px; text-align:center;">Please enter the information below to register, then click [Continue with Registration].</div>
	<hr></TD></tr>
	<tr><td><span style="font-size:1.5em;font-weight:bold;">New Registration</span>
  	<tr>
      <td  valign="center" width="15%">Organisation name:</td>
		<td width="30%"><INPUT type="text" name="x_orgname" size="40" maxlength="40">
		<br><span style="font-size:10px; color:#880000">If you are registering as an individual please leave this field blank.</span>
		</td>
		<td>
		<!--Other name: <span style="padding-left:30px;">
		</td>
		<td>
		<INPUT type="text" name="x_oname" size="25" maxlength="25"></span>
		</td-->
		<td></td>
    </tr>
    <tr>
      <td>First name:</td>
      <td><INPUT type="text" name="x_fname" size="25" maxlength="25"></td>
		<td >Surname:</td>
		
		<td><INPUT type="text" name="x_surname" size="25" maxlength="25"></td>
		<!--td>
		<input type="text" name="x_dob_d" size="3"maxlength="2">/
		<input type="text" name="x_dob_m" size="3"maxlength="2">/
		<input type="text" name="x_dob_y" size="5"maxlength="4">
		<input type="hidden" name="x_dob">
		
		<span style="border:solid;border-width:1px; padding-top:5px;padding-left:5px;padding-right;5px;padding-bottom:5px;">
		F:<input type="radio" name="gender" value="f" style="position:relative;top:+2px;">
		| M:<input type="radio" name="gender" value="m" style=position:relative;top:+2px;">
		</span>
		</td-->
    </tr>
	<tr>
    <td>Email Address:</td>
		<td><INPUT type="text" name="x_email_add" size="30" maxlength="60" onchange=set_login_name()>
		<br><span style="font-size:10px; color:#880000">Please ensure that the email address is valid.</span></td>
	</tr>
    </tr>
    <tr><td>Phone Number:</td>
      <td valign="top"><INPUT type="text" name="x_phone" size="15" maxlength="15">
		</td>
	  <td>Mobile Phone Number:</td>
      <td valign="top"><INPUT type="text" name="x_mphone" size="15" maxlength="15">
		</td>
    </tr>
	
		<tr>
		<TD width=15%>
		Address Line 1:
		</TD>
		<TD width=* colspan=3>
		<INPUT type="text" name="x_addr_1" size="20" maxlength="20"> (Building, House,  Flat or Unit num / Block num and Street name as applicable)
		</TD>
		</tr>
		<tr></tr>
		<TD width=15%>
		Address Line 2:
		</TD>
		<TD width=25%>
		<INPUT type="text" name="x_addr_2" size="20" maxlength="20">
		</TD>
		</TR>
		<tr>
		<TD width=15%>
		City/Town:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_suburb" size="20" maxlength="20">
		</TD>
		<TD width=15%>
		Postcode:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_pcode" size="8" maxlength="8">
		</TD>
		</TR>
		<tr>
		<TD width=15%>
		State/Province:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_state" size="20" maxlength="20">
		</TD>
		<TD width=15%>
		Country:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_country" size="20" maxlength="20">
		</TD>
		</TR>
	<tr>
	<TD colspan=2 rowspan=2>
		Member Login Details <span style="font-size:10px; color:#880000">(Login Name is set to Email Address)</span><br>
	<table style="border-bottom-style : solid; border-bottom-width : 1px; border-left-style : solid; border-left-width : 1px; border-right-style : solid; border-right-width : 1px; border-top-style : solid; border-top-width : 1px; padding:2px;">
		<tr>
		
			<TD width=35%>Login Name:</td>
		<td ><INPUT type="text" name="x_login_name_show" size="30" maxlength="50" disabled style="color: #000000;background:#e5e5e5">
		<INPUT type=hidden name="x_login_name"</td>
		<td><div id="err0"></div></td>
		</TR>
		<tr>
		<TD width=20%>Choose a Password:</td>
		<td valign="top"><INPUT type="password" name="x_pword1" size="12" maxlength="12">&nbsp;&nbsp;(6 chars or more.)</td>
		<td></td>
		</tr>
		<tr>
		<TD>Verify your Password:</td>
		<td><INPUT type="password" name="x_pword2" size="12" maxlength="12"></td>
		<td></td>
		
		</tr>
	
	</table>
	</td>
	<td colspan="2" rowspan="2">
	<table width=70%>
	<tr>
	<td>Alternative Contact Name:</td>
	<td><INPUT type="text" name="x_second_name" size="20" maxlength="20"</td>
	</tr>
	<tr>
	<td>Alternative Contact Phone:</td>
	<td><INPUT type="text" name="x_second_phone" size="15" maxlength="15"</td>
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	
	</tr>
	<tr><TD colspan=3>How did you find out about us?&nbsp;&nbsp;<INPUT type="text" name="x_find_us" size="60" maxlength="60">
	<!--br>
	<span style="font-size:10px; color:#880000">(Optional)</span-->
	<td>Reference: <input type="text" name="x_reference" size="8" mazlength="8"><br>
	<span style="font-size:10px; color:#880000">Please enter reference above if you have one, else leave blank.</span>
	</td>
	</tr>
	<!-- tr><TD colspan=2>Would you like to receive email information about Special Offers etc?&nbsp;&nbsp;<INPUT type="checkbox" name="x_spec_off"><td></tr-->
		<tr><TD colspan=4><hr></td></tr>
	<tr>
	<TD colspan=4 align="center">
		<INPUT type="button" value="Continue with registration  >>" name="register" onclick="javascript:elt_register()" style="background-color : #D7E3F4; color : #000055;">
	</td>
	</tr>
	<tr><TD colspan=4>
		<div style="background-color : #2E2ECA; color : #ffffff; font-size : 10px; padding:2px; text-align:center;"> The information you provide here will never be disclosed to any other individual or organisation, unless required by a court of law. </div>
	</TD></tr>
  </tbody>
</table>
</form>
</font>
</body>

</html>

endprint;

?>

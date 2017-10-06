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
  <title>TakeIn Patron Registration</title>
</head>

<script language="javascript">
function tk_register()
{

	if (document.form1.x_fname.value == "")
{
		alert ("Please enter your first name.");
}
	else
{
		if (document.form1.x_phone.value == "")
{
			alert ("Please enter your phone number.");
}
		else
{
			if (document.form1.x_email_add.value == "")
{
				alert ("Please enter your email address.");
}
			else
{
	if ((document.form1.x_addr_num.value == "")||(document.form1.x_addr_street.value == "")||(document.form1.x_addr_suburb.value == "")||(document.form1.x_addr_pcode.value == ""))
			{
				alert ("Address seems to be incomplete. Please verify.");
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
				document.form1.submit();
} 	}	}	}	}	}
}
</script>
<body bgcolor="#ffffff">
<font color="#005500">
<div style="background-color : #d0e7bf; color : #005500; font-size : 10px; height : 12px; position : relative; text-align : center; top : -5px; vertical-align : middle; word-spacing : 15px;">
		<!--a href=info/tk_faq.html style="color:#005500;">FAQ</a-->
		<a href=javascript:history.back() style="color:#005500;">Home</a>
		<a href=info/tk_rates.html style="color:#005500;">Delivery_Info_&_Rates</a>
		<a href=info/tk_delivery.html style="color:#005500;">Delivery_Area</a>
		<a href=info/tk_contact.html style="color:#005500;">Contact_TakeIn</a>
		<a href=info/tk_partner.html style="color:#005500;">Partner_Login</a>
		<a href=info/tk_faq.html style="color:#005500;">Help</a>
		</div>
 <table width="100%" cellpadding="1" cellspacing="1" border="0" style="text-align: center;">
        <tbody>
          <tr>
			<td><span style="font-size:16pt;font-weight: bold; color:#005500;">
		<IMG src="images/patron_reg_15.jpg" align="center" border="0" alt="Patron Registration"></span>
			</td>
		<td style="vertical-align: top; text-align: right;"><img  src="images/takein_logo_01-18.png" style="border: 0px solid ;" alt="Greenwareit">
			</td>
          </tr>
        </tbody>
      </table>
<hr>
<FORM name="form1" action="tk_register_cont.php" method="get" enctype="application/x-www-form-urlencoded">
	$w_ref_tag
    <table width="95%" align="center" bgcolor="#B5D5BD" cellpadding="3" style="font-size: 12px;">
   <tbody>
	<tr><TD colspan=3>
		<div style="background-color : #ff7508; color : #ffffff; font-size : 14px; padding:5px; text-align:center;">Why Register? Registration entitles you to Special Offers, Discounts and Rewards from time to time.</div>
	<hr></TD></tr>
  	<tr>
      <td  width="15%">First name:</td>
		<td width="*"><INPUT type="text" name="x_fname" size="25" maxlength="25">&nbsp;&nbsp;(So that we know who to ask for if we have to call you!)</td>
		<td></td>
    </tr>
    <tr>
      <td>Surname:</td>
      <td><INPUT type="text" name="x_surname" size="25" maxlength="25"></td>
		<td></td>
    </tr>
	<tr>
    <td>Phone Number:</td>
      <td><INPUT type="text" name="x_phone" size="15" maxlength="15">
		&nbsp;&nbsp;(So that we know what number to dial if we have to call you!)</td>
		<td></td>
		</tr>
    <tr>
		<td valign="top">Email Address:</td>
		<td><INPUT type="text" name="x_email_add" size="30" maxlength="60">
		<br><span style="font-size:10px; color:#880000">Please ensure that the email address is valid, so that we can respond back to you!</span></td>
		<td></td>
    </tr>
	<tr>
	<TD colspan=2>
		Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(So that we know where to deliver your orders!)<br>
		<table style="border-bottom-style : solid; border-bottom-width : 1px; border-left-style : solid; border-left-width : 1px; border-right-style : solid; border-right-width : 1px; border-top-style : solid; border-top-width : 1px; padding:5px;">
		<tr>
		<TD width=15%>
		House/Flat/Unit Number:
		</TD>
		<TD width=45%>
		<INPUT type="text" name="x_addr_num" size="5" maxlength="5"> (Flat or Unit num / Block num if applicable)
		</TD>
		<TD width=15%>
		Street Name:
		</TD>
		<TD width=25%>
		<INPUT type="text" name="x_addr_street" size="20" maxlength="20">
		</TD>
		</TR>
		<tr>
		<TD width=15%>
		Suburb:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_addr_suburb" size="20" maxlength="20">
		</TD>
		<TD width=15%>
		Postcode:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_addr_pcode" size="6" maxlength="6">
		</TD>
		</TR>
		<tr>
		<TD>Street Directory Reference:</TD>
		<TD colspan=3>
		Map Num:&nbsp;<INPUT type="text" name="x_addr_map" size="4" maxlength="4">&nbsp;&nbsp;
		Ref:&nbsp;<INPUT type="text" name="x_addr_mapref" size="4" maxlength="4">
		&nbsp;&nbsp;Melways<INPUT type="radio" name="x_SD" value="M" checked>
		&nbsp;&nbsp;UBD<INPUT type="radio" name="x_SD" value="U" >
		&nbsp;&nbsp;(Great help to our delivery drivers!)</TD>
		</tr>
		<TD>Delivery Instructions:</TD>
		<TD colspan=3><INPUT type="text" name="x_deliv_inst" size="80" maxlength="80">
		<br><span style="font-size:10px; color:#880000">Optional instructions to facilitate delivery, eg, "White house at the back."</span>
		</tr>
		</table>
	<//tr>
	</tr>
	<tr>
	<td colspan=3>
	<table><TR>
		<TD width=20%>Choose a Login Name:</td>
		<td ><INPUT type="text" name="x_login_name" size="12" maxlength="12">&nbsp;&nbsp;(You will need this to login!)</td>
		<td><div id="err0"></div></td>
		</TR>
		<tr>
		<TD width=20%>Choose a Password:</td>
		<td valign="top"><INPUT type="password" name="x_pword1" size="12" maxlength="12">&nbsp;&nbsp;(6 chars minimum length.)</td>
		<td></td>
		</tr>
		<tr>
		<TD>Verify your Password:</td>
		<td><INPUT type="password" name="x_pword2" size="12" maxlength="12"></td>
		<td></td>
		</tr>
	</table>
	</td>
	</tr>
	<tr><TD colspan=2>How did you find out about us?&nbsp;&nbsp;<INPUT type="text" name="x_find_us" size="60" maxlength="60"><td></tr>
	<tr><TD colspan=2>Would you like to receive email information about Special Offers etc?&nbsp;&nbsp;<INPUT type="checkbox" name="x_spec_off"><td></tr>
		<tr><TD colspan=2><hr></td></tr>
	<tr>
	<TD colspan=2 align="center">
		<INPUT type="button" value="Continue with Registration" name="register" onclick="javascript:tk_register()" style="background-color : #d5e6bd; color : #005500;">
	</td>
	</tr>
  </tbody>
</table>
</form>
</font>
</body>

</html>

endprint;

?>
<?php

require_once "tk_db_connect.php";

$w_ref_tag = $w_ref = "";
if (isset($_GET["x_reference"]))
{
	$w_ref = urldecode($_GET["x_reference"]);
	$w_ref_tag = "<input type=\"hidden\" name=\"x_ref\" value=\"$w_ref\">";
}

$w_pid = urldecode($_REQUEST["x_patron_id"]);

$w_query = "select * from tk_patron where p_id = '$w_pid'";
$w_res = $tk_db->query($w_query);
$w_row = $w_res->fetchRow();


if ($w_row == "")
{
print <<< endprint
No registration details for Patron were found.  The most likely reason is that the Patron has recently been deleted.
endprint;
}
else
{
// get the data ...
$w_sname = ucwords($w_row["p_sname"]);
$w_fname = ucwords($w_row["p_fname"]);
$w_phone = $w_row["p_phone"];
$w_email = $w_row["p_email"];
$w_add1 = $w_row["p_add_1"];
$w_add2 = $w_row["p_add_2"];
$w_add3 = $w_row["p_add_3"];
$w_city = $w_row["p_city"];
$w_pcode = $w_row["p_pcode"];
$w_mapref = $w_row["p_mapref"];

$w_di = $w_row["p_di"];

$w_recv_email = $w_row["p_recv_email"];
$w_checked = "";
if ($w_recv_email == "t")
{
	$w_checked = "checked";
}

$w_mref = explode("-", $w_mapref);
$w_map = $w_mref[1];
$w_ref = strtoupper($w_mref[2]);

$w_mchecked = $w_uchecked = "";
if ($w_mref[0] == "M")
{
	$w_mchecked = " value=\"M\" checked";
}
if ($w_mref[0] == "U")
{
	$w_uchecked = " value=\"U\" checked";
}

print <<< endprint

<FORM name="form1" action="tk_register_update_2.php" method="post" enctype="application/x-www-form-urlencoded">
	$w_ref_tag
    <table width="95%" align="center" bgcolor="#B5D5BD" cellpadding="3" style="font-size: 12px;">
   <tbody>
	<tr><TD colspan=3>
		<div style="background-color : #ff7508; color : #ffffff;font-size:12px;font-weight:bold; padding-left:8px;padding-right:8px;word-spacing: 0px;">Please verify and update your Patron details shown below or change your password, if necessary. </div>
	<hr></TD></tr>
 	<tr>
      <td  width="15%">Name:</td>
		<td width="*" style="text-align:left;font-size:14px;font-weight:bold;color:#000000;">$w_fname &nbsp;$w_sname</td>
		<td align="right">
		<a href=#change_password>
		<INPUT type="button" name="change_password" value="Click to Change Password" style="background-color : #d5e6bd; color : #005500;"></a></td>
    </tr>
    <tr>
    <td>Phone Number:</td>
    <td colspan="2">
      <INPUT type="text" name="x_phone" size="15" value="$w_phone"  maxlength="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Email Address:&nbsp;&nbsp;<INPUT type="text" name="x_email_add" size="30" maxlength="60" value="$w_email">
	</td>
    </tr>
	<tr>
	<TD colspan=3>
		Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(So that we know where to deliver your orders!)<br>
		<table style="border-bottom-style : solid; border-bottom-width : 1px; border-left-style : solid; border-left-width : 1px; border-right-style : solid; border-right-width : 1px; border-top-style : solid; border-top-width : 1px; padding:5px;">
		<tr>
		<TD width=15%>
		House/Flat/Unit Number:
		</TD>
		<TD width=45%>
		<INPUT type="text" name="x_addr_num" size="5" maxlength="5" value="$w_add1">
		</TD>
		<TD width=15%>
		Street Name:
		</TD>
		<TD width=25%>
		<INPUT type="text" name="x_addr_street" size="20" maxlength="20" value="$w_add2">
		</TD>
		</TR>
		<tr>
		<TD width=15%>
		Suburb:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_addr_suburb" size="20" maxlength="20" value="$w_city">
		</TD>
		<TD width=15%>
		Postcode:
		</TD>
		<TD width=35%>
		<INPUT type="text" name="x_addr_pcode" size="6" maxlength="6" value="$w_pcode">
		</TD>
		</TR>
		<tr>
		<TD>Street Directory Reference:</TD>
		<TD colspan=3>
		Map Num:&nbsp;<INPUT type="text" name="x_addr_map" size="4" maxlength="4" value="$w_map">&nbsp;&nbsp;
		Ref:&nbsp;<INPUT type="text" name="x_addr_mapref" size="4" maxlength="4" value="$w_ref">
		&nbsp;&nbsp;Melways<INPUT type="radio" name="x_SD" $w_mchecked onchange="document.form1.x_sdir.value='M'">
		&nbsp;&nbsp;UBD<INPUT type="radio" name="x_SD" $w_uchecked onchange="document.form1.x_sdir.value='U'">
		&nbsp;&nbsp;(Great help to our delivery drivers!)
		<input type="hidden" name="x_sdir" value="$w_mref[0]">;
		</TD>
		</tr>
		<TD>Delivery Instructions:</TD>
		<TD colspan=3><INPUT type="text" name="x_deliv_inst" size="80" maxlength="80" value="$w_di">
		<br><span style="font-size:10px; color:#880000">Optional instructions to facilitate delivery, eg, "White house at the back."</span>
		</tr>
		</table>
	</tr>
	<tr>
	<td colspan="3">
	<a name="change_password">
	<span style="font-size:14px;color:#006600;">Change Password:</span>&nbsp;&nbsp; (Fill up only if changing password)<br>
	<table width="100%" style="border-bottom-style : solid; border-bottom-width : 1px; border-left-style : solid; border-left-width : 1px; border-right-style : solid; border-right-width : 1px; border-top-style : solid; border-top-width : 1px; padding:5px;"><TR>
		<TD width=15%>Old Password:</td>
		<td><INPUT type="password" name="x_old_pword" size="12" maxlength="12"></td>
		</TR>
		<tr>
		<TD width=15>New Password:</td>
		<td>
		<INPUT type="password" name="x_pword1" size="12" maxlength="12">&nbsp;&nbsp;(6 chars min. length.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verify New Password:
		&nbsp;&nbsp;<INPUT type="password" name="x_pword2" size="12" maxlength="12"></td>
		</tr>
	</table>
	</td>
	</tr>
	<tr><TD colspan=3>Would you like to receive email information about Special Offers etc?&nbsp;&nbsp;<INPUT type="checkbox" name="x_spec_off" $w_checked onchange="check_so('$w_recv_email')">
	<input type="hidden" value="$w_recv_email" name="x_spec_offer">
	<td></tr>
	<tr>
	<TD colspan=3><hr></td></tr>
	<tr>
	<TD colspan=3 align="center">
		<INPUT type="button" value="Save Changes" name="update_detail" onclick="javascript:tk_register_update('$w_pid')" style="background-color : #d5e6bd; color : #005500;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<INPUT type="button" value="Cancel" name="cancel" onclick="javascript:history.back()" style="background-color : #cccccc; color : #555555;">
	</td>
	</tr>
  </tbody>
</table>
</form>


endprint;
}

?>
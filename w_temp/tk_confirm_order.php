<?php

require_once "tk_db_connect.php";


// get order delivery detail
$w_sessid = urldecode($_GET["x_sessid"]);

if (isset($tk_userid))
{
	$w_userid = urldecode($tk_userid);
	//get_user_detail($w_userid);

$w_query = "select * from tk_patron where p_id = '$w_userid'";
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
$w_surname = ucwords($w_row["p_sname"]);
$w_fname = ucwords($w_row["p_fname"]);

$w_p_name = $w_fname." ".$w_surname;
$w_phone = $w_row["p_phone"];
$w_email_add = $w_row["p_email"];
$w_addr_num = $w_row["p_add_1"];
$w_addr_street = $w_row["p_add_2"];
$w_addr_suburb = $w_row["p_add_3"];
$w_addr_suburb = $w_row["p_city"];
$w_addr_pcode = $w_row["p_pcode"];
$w_mapref = $w_row["p_mapref"];

$w_addr_state = "Vic";

$w_deliv_inst = $w_row["p_di"];

$w_recv_email = $w_row["p_recv_email"];
$w_checked = "";
if ($w_recv_email == "t")
{
	$w_checked = "checked";
}

$w_mref = explode("-", $w_mapref);
$w_addr_map = $w_mref[1];
$w_addr_map_ref = strtoupper($w_mref[2]);

$w_mchecked = $w_uchecked = "";
if ($w_mref[0] == "M")
{
	$w_mchecked = " value=\"M\" checked";
}
if ($w_mref[0] == "U")
{
	$w_uchecked = " value=\"U\" checked";
}

}
}
else //no one is logged in
{
	$w_p_name  = "";
	$w_fname=$w_surname=$w_phone=$w_email_add=$w_addr_num=$w_addr_street="";
	$w_addr_suburb=$w_addr_state=$w_addr_pcode="";
	$w_addr_map=$w_addr_map_ref=$w_deliv_inst="";
}

print <<< endprint

<script language="javascript">

//var tk_object = new ajax_request();
//alert("dada");

get_order('$w_sessid');

</script>


<FORM name="form1" action="tk_confirm_order2.php" method="get" enctype="application/x-www-form-urlencoded">
    <table width="95%" align="center" bgcolor="#B5D5BD" cellpadding="3" style="font-size: 12px;line-height:10px;">
   <tbody>
	<tr><TD colspan=3>
		<div style="background-color : #ff7508; color : #ffffff; font-size : 10px; padding:2px; text-align:left;">Please provide the following order delivery detail:</div>
	<hr></TD></tr>
  	<tr>
      <td  width="25%">Your name</td>
		<td width="*"><INPUT style="height:14px;font-size:12px;" type="text" name="x_fname" value="$w_p_name" size="35" maxlength="35"></td>

    </tr>
    <!--tr>
      <td>Surname:</td>
      <td><INPUT style="height:14px;font-size:12px;" type="text" name="x_surname" size="25" value="$w_surname" maxlength="25"></td>

    </tr-->
	<tr>
    <td>Phone Number:</td>
      <td><INPUT style="height:14px;font-size:12px;" type="text" name="x_phone" size="15" value="$w_phone" maxlength="15">
		</td>

		</tr>
    <tr>
		<td valign="top">Email add.:</td>
		<td><INPUT style="height:14px;font-size:10px;" type="text" name="x_email_add" size="30" value="$w_email_add" maxlength="60">
		<br><span style="font-size:10px; color:#880000">Ensure email address is valid. </span></td>
    </tr>
	<tr>
	<TD colspan=2>
		<div style="position:relative;top:-3px;">Delivery Address</div>
		<div>
		<table style="border-bottom-style : solid; border-bottom-width : 1px; border-left-style : solid; border-left-width : 1px; border-right-style : solid; border-right-width : 1px; border-top-style : solid; border-top-width : 1px; padding:5px;line-height:10px;" align="center">
		<tr>
		<TD width="35%">
		Number:<br>
		<!--/TD>
		<TD-->
		<INPUT style="height:14px;font-size:12px;" type="text" value="$w_addr_num" name="x_addr_num" size="5" maxlength="5">
		</TD>
		<!--/tr>
		<tr-->
		<TD>
		Street:<br>
		<!--/TD>
		<TD-->
		<INPUT style="height:14px;font-size:12px;" type="text" value="$w_addr_street" name="x_addr_street" size="20" maxlength="20">
		</TD>
		</TR>
		<tr>
		<TD>
		Suburb:
		</TD>
		<TD>
		<INPUT style="height:14px;font-size:12px;" type="text" value="$w_addr_suburb" name="x_addr_suburb" size="20" maxlength="20">
		</TD>
		</tr>
		<tr>
		<TD>
		Postcode:
		</td>
		<td>
		<INPUT style="height:14px;font-size:12px;" type="text" value="$w_addr_pcode" name="x_addr_pcode" size="6" maxlength="6">&nbsp;&nbsp;&nbsp;
		State:&nbsp;
		<INPUT style="height:14px;font-size:12px;" type="text" value="$w_addr_state" name="x_addr_state" size="4" maxlength="4">
		</TD>
		</TR>
		<tr>
		<TD>Street Direct. Reference:</TD>
		<TD colspan=2>
		Map:&nbsp;<INPUT style="height:14px;font-size:12px;" type="text" name="x_addr_map" value="$w_addr_map" size="4" maxlength="4">&nbsp;&nbsp;
		Ref:&nbsp;&nbsp;<INPUT style="height:14px;font-size:12px;" type="text" name="x_addr_mapref" value="$w_addr_map_ref" size="4" maxlength="4">
		</TD>
		</TR>
		<tr>
		<TD>&nbsp;</td>
		<td>
		Melways<INPUT style="height:14px;font-size:12px;" type="radio" name="x_sd" $w_mchecked onchange="document.form1.x_sdir.value='M'">&nbsp;&nbsp;
		UBD<INPUT style="height:14px;font-size:12px;" type="radio" name="x_sd" $w_uchecked onchange="document.form1.x_sdir.value='M'">
		</td>
		</tr>
		<tr>
		<TD valign="top">Delivery Instructions:</TD>
		<td><textarea rows="2" wrap="virtual" style="font-size:10px;">$w_deliv_inst</textarea></td>
		</tr>
		</table>
		</div>
	</td>
	<tr><td colspan="2" align="right"><span font-size=8px>Enter Order Code if available:&nbsp;</span><INPUT type="text" name="x_order_code" size="10" maxlength="10" style="height:14px;font-size:12px;"></td>
	</tr>
	<tr><td colspan="2" align="right"><INPUT type="button" name="cont" value="Continue" alt="Proceed to Payment" onclick="tk_order_payment()" style="background-color:#008800;color:#ffffff;height:20px;font-size:12px;"></td></tr>
  </tbody>
</table>
</form>


endprint;

?>
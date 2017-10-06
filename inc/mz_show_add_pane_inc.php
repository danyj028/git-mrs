<?php

print <<< endprint
<script language="javascript">
function set_login_name_a()
{
	document.getElementsByName("x_login_name_a")[0].value = document.getElementsByName("x_email_add_a")[0].value;
	document.form_add.x_login_name_show_a.value = document.form_add.x_email_add_a.value;
	document.form_add.x_login_name_a.value = document.form_add.x_email_add_a.value;
	//alert(document.form1.x_login_name.value);
	alert("Pleae note: Login Name below has been set to Email Address.");
}

function mz_save_record()
{
	mz_add_user();
}

</script>


<style>
.mz_b_menu_sm_l
	{
		background-color:#dddddd;
		color: #000055;
		font-size:0.9em;
		width:150px;
		height:30px;
			
	}	
</style>
<div style="position:relative;top:-10px;z-index:inherit;">
</div>

<FORM name="form_add" action="mz_register_cont.php" method="post" enctype="application/x-www-form-urlencoded">
	$w_ref_tag
    <table width="98%" align="center" bgcolor="#D7E3F4" cellpadding="3" style="font-size: 12px;margin-top:-1em;">
   <tbody>
	<tr>
	<TD colspan=4>
		<div style="background-color: #2E2ECA;  color : #ffffff; font-size : 12px; padding:2px; text-align:center;">Add a new Member: Please enter information below then [Save Record] to save the new record.</div>
	<hr>
	</TD>
	</tr>
  	
  	<tr>
      <td  valign="top" width="15%">Organisation name:</td>
		<td valign="top" width="30%"><INPUT type="text" name="x_orgname" size="40" maxlength="40">
		<br><span style="font-size:10px; color:#880000">If registering as an individual please leave this field blank.</span>
		</td>
		<td valign="top">
		Member category: <span style="padding-left:30px;">
		</td>
		<td valign="top">
		<INPUT type="text" name="x_category" size="3" maxlength="3" value="1"></span>
		</td>
		<!--td></td-->
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
    <td>Email address:</td>
		<td><INPUT type="text" name="x_email_add_a" size="30" maxlength="60" onchange=set_login_name_a()>
		<br><span style="font-size:10px; color:#880000">Please ensure that the email address is valid.</span></td>
	</tr>
    </tr>
    <tr><td>Phone number:</td>
      <td valign="top"><INPUT type="text" name="x_phone" size="15" maxlength="15">
		</td>
	  <td>Mobile phone number:</td>
      <td valign="top"><INPUT type="text" name="x_mphone" size="15" maxlength="15">
		</td>
    </tr>
	
		<tr>
		<TD width=15%>
		Address line 1:
		</TD>
		<TD width=* colspan=3>
		<INPUT type="text" name="x_addr_1" size="20" maxlength="20"> (Building, House, Flat or Unit num / Block num and Street name if applicable)
		</TD>
		</tr>
		<tr></tr>
		<TD width=15%>
		Address line 2:
		</TD>
		<TD width=25%>
		<INPUT type="text" name="x_addr_2" size="20" maxlength="20">
		</TD>
		</TR>
		<tr>
		<TD width=15%>
		City:
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
	<td width=15%>Alternative contact name:</td>
	<td width=35%><INPUT type="text" name="x_sec_name" size="20" maxlength="20"</td>
	
	
	<td width=15%>Alternative contact phone:</td>
	<td width=35%><INPUT type="text" name="x_sec_phone" size="15" maxlength="15"</td>
	</tr>
	<!--/table-->
	</td>
	</tr>
	
	<tr>
	<TD width=100% colspan=5>
	Member Login Details <span style="font-size:10px; color:#880000">(Login Name is set to Email Address.  Password is 6 characters or more)</span><br>
		
	<table width=98% style="border-bottom-style : solid; border-bottom-width : 1px; border-left-style : solid; border-left-width : 1px; border-right-style : solid; border-right-width : 1px; border-top-style : solid; border-top-width : 1px; padding:2px;">
		<tr>
		
		<TD >Login Name:</td>
		<TD width=30% ><INPUT type="text" name="x_login_name_show_a" size="30" maxlength="50" disabled style="color: #000000;background:#e5e5e5">
		<INPUT type=hidden name="x_login_name_a"</td>
		<!--td><div id="err0"></div></td-->
		<TD>
		Choose a Password:<INPUT type="password" name="x_pword1" size="12" maxlength="12">&nbsp;&nbsp;</td>
		<TD>
		Verify Password:
		<INPUT type="password" name="x_pword2" size="12" maxlength="12"></td>
		</tr>
	</table>
	</td>
	</tr>
	<!--tr>
	<td colspan=4><hr></td>
	</tr-->
	<tr>
	<TD colspan=4 align="center">
	
		<INPUT class="mz_b_menu_sm_l" type="button" value="Save Record" name="Save" onclick="javascript:mz_save_record()">
				&nbsp;&nbsp;&nbsp;
		<INPUT class="mz_b_menu_sm_l" type="button" value="Cancel" name="close" onclick="javascript:mz_cancel()"
	</td>
	</tr>
	<tr><TD colspan=4>
		<div style="background-color : #2E2ECA; color : #ffffff; font-size : 10px; padding:2px; text-align:center;"> The information you provide here will never be disclosed to any other individual or organisation, unless required by a court of law. </div>
	</TD></tr>
  </tbody>
</table>
</form>

endprint;

?>

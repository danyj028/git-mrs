<?php

include "./inc/connect_to_db.php";
//include "./inc/mz_user_classes.php";

function get_user_blurb($f_userid, &$f_user_tag_line, &$f_user_blurb, &$f_user_url, &$f_mz_db)
{
	
	$f_sql = "select * from mz_user_profile where user_id = '$f_userid'";

	$w_stm = $f_mz_db->prepare($f_sql);
	$w_stm->execute();
		
		$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);
				
		if  (isset($w_rec) && $w_rec > 0)
		{
				$f_user_tag_line = $w_rec["user_tag_line"];
				$f_user_url = $w_rec["user_url"];
				$f_user_blurb = $w_rec["profile"];
		}

}

$w_user_blurb = "";
$w_user_tag_line = "";
$w_user_url = "";

get_user_blurb($this->h_userid, $w_user_tag_line, $w_user_blurb, $w_user_url, $mz_db);

$w_member_name = $this->h_userid;

print <<< endprint

<script type="text/javascript" src="../../jscript/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
function mz_save_blurb()
{
	//alert("save_record");
	document.form_edit_blurb.submit();
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

		
<div id="mz_list" 
style="margin-left:10px;position:inherit;top:-20px;left:10%;height:80%;width:35%;
z-index:100;border:solid;border-width:1px;padding-left:10px;padding-right:10px;padding-top:10px;
background-color:#fafafa;opacity:0.97;visibility:hidden;">
<div style="margin-left:10px;">
<div style="text-align:right;position:relative;top:-10px;right:-10px;">
<input type="button" style="height:24px; width:24px;background-color:#ffffff;font-size:12px;text-align:center; solid;font-weight:bold;color:#880000;" name="Cancel" value="X" onclick="close_mzlist()">
</div>

</div>

</div>	

<div id="wait_d" style="position:inherit;top:5%;left:50%;z-index:20;visibility:hidden;">
		<img id="wait_anim"src="./mz_img/wait_animation.gif" width="30px" alt="Wait ...loading" align="bottom">
</div>

<div style="position:relative;top:-10px;z-index:inherit;">


</div>

<FORM name="form_edit_blurb" action="inc/mz_blurb_save.php" method="post" enctype="application/x-www-form-urlencoded">
	<input type="hidden" name="x_userid" value="$this->h_userid">
    <table width="98%" align="center" bgcolor="#D7E3F4" cellpadding="3" style="font-size: 12px;margin-top:-1em;">
   <tbody>
	<tr>
	<TD colspan=2>
		<div style="background-color: #7D2308;  color : #ffffff; font-size : 12px; padding:2px; text-align:center;">Edit Profile. Please edit information below then select [Save] or [Cancel].</div>
	<hr>
	</TD>
	</tr>
  	<tr>
      <td>Member: <span style="font-weight:bold;font-size:1.5em;">$w_member_name</span>
      </td>
     </tr>
     <tr> 
      <td>Profile tag line<br>
      <INPUT type="text" size=60 maxlength=80 name="x_tag_line" id="bl1" value="$w_user_tag_line"> 
	
      <br>
      <span style="font-size:0.8em;">This will appear next to business name in search result.</span>
      </td>
    </tr>
  	
    <tr>
      <td>Profile blurb : extended description of your business, products and services.  You may use html elements here<br>
      <textarea id="bl2" name="x_blurb" cols=80 rows=18 style="resize:none;">$w_user_blurb</textarea>
      </td>
    </tr>
    <tr>
	<td>Website URL<br>
      <INPUT type="text" size=60 maxlength=80 name="x_url" id="bl3" value="$w_user_url"> 
      <br>
      <span style="font-size:0.8em;">Website to link to for more info.</span>
      </td>
	</tr>
    
	</table>
	</td>
	
	</tr>
	<tr>
	<td colspan=4><hr></td>
	</tr>
	<TD colspan=4 align="center">
		<INPUT class="mz_b_menu_sm_l" type="button" value="Save Profile" name="Save" onclick="javascript:mz_save_blurb()">
		&nbsp;&nbsp;&nbsp;		
		<INPUT class="mz_b_menu_sm_l" type="button" value="Cancel Changes" name="cancel" onclick="javascript:mz_cancel()">
	</td>
	</tr>
	<tr><TD colspan=4>
		<div style="background-color : #7D2308; color : #ffffff; font-size : 10px; padding:2px; text-align:center;">&nbsp</div>
	</TD></tr>
  </tbody>
</table>
<input type="text" name="x_id" hidden>
</form>
<script type='text/javascript'>

 //document.getElementById("mz_prod_cat_edit_pane").innerHTML.reload;
 CKEDITOR.replace( 'bl2' );

endprint;

//echo ("document.getElementById(\"bl1\").value= \"$w_user_tag_line\"; ");
//echo ("document.getElementById(\"bl3\").value= \"$w_user_url\"; ");



echo "</script>";


?>

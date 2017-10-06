<?php

print <<< endprint

<script>
function mz_pcl_save_record()
{
	//alert("save_record");
	document.form_pcl_edit.submit();
}
</script>	

<FORM name="form_pcl_edit" action="inc/mz_prod_cat_edit_save.php" method="post" enctype="application/x-www-form-urlencoded">
	$w_ref_tag
	<input type="hidden" name="x_userid" value="$this->h_userid">
    <table width="98%" align="center" bgcolor="#D7E3F4" cellpadding="3" style="font-size: 12px;margin-top:-1em;">
   <tbody>
	<tr>
	<TD colspan=4>
		<div style="background-color: #7D2308;  color : #ffffff; font-size : 12px; padding:2px; text-align:center;">Edit Products and Services: Please edit information below then [save] or select [delete] to delete the  record.</div>
	<hr>
	</TD>
	</tr>
  	<tr>
      <td>Member: <span style="font-weight:bold;font-size:1.2em;">$w_member_name</span>
      </td>
    </tr>
    <tr>
    <td colspan=4>Please select product category to associate to your products and services then click [Save Selection] below
    <br>
    <hr>
    </td>
    </tr>
	<tr>
	<td >
		<INPUT class="mz_b_menu_xsm_l" type="button" value="Fewer options..." name="select_list" onclick="javascript:mz_select_list('s')">
	</td>	
	</tr>
endprint;

$w_user_service_array=[];  //stores user services
$w_ndx_array=[]; //stores cat index

get_user_service($this->h_userid, $w_user_service_array, $mz_db);

$w_sub_cat_array=["Technology", "Product-Function", "Industry", "Services-Other"];
$l=0;

$dvc="<span class=mz_dvc>";
//$dvc="<span>";

for ($c=1;$c<5;$c++)
{

$w_cat_array = [];	
get_categories($c, $w_cat_array, "l", $mz_db);

//for ($k==0;$k<=$w_rec_no;$k=$k+1)

$k=0;
$max = sizeof($w_cat_array);
echo "<tr><td style=\"font-size:1.2em;font-weight:bold;\">".$w_sub_cat_array[$c-1]."</td></tr>";
// ==>
for($k==0;$k<$max-4;$k=$k+4)
{
	$kn=$k+1+$l;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k][0].">";
	echo "<tr><td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".
	$w_cat_array[$k][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+1][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+1][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".$w_cat_array[$k+1][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k+1][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+2][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+2][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".$w_cat_array[$k+2][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k+2][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+3][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+3][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".$w_cat_array[$k+3][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k+3][0];
	
	echo "</tr>";

}

while ($k<$max-1)
{
	$kn=$k+1+$l;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".$w_cat_array[$k][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k][0];
	$k=$k+1;
}	
$l=$kn;
echo"<tr><td><hr></td></tr>";
}
//<==
print <<< endprint

    </tr>
	</td>	
	
	</table>
	</td>
	</tr>
	
	<tr>
	
	</tr>
	
	<tr>
	<td colspan=4><hr></td>
	</tr>
	<tr>
	<TD colspan=4 align="center">
		<INPUT class="mz_b_menu_sm_l" type="button" value="Save Selection" name="Save" onclick="javascript:mz_pcl_save_record()">
		&nbsp;&nbsp;&nbsp;
		<INPUT class="mz_b_menu_sm_l" type="button" value="Cancel Selection" name="delete" onclick="javascript:mz_change_member_status(2)">	
		&nbsp;&nbsp;&nbsp;
		<!--INPUT class="mz_b_menu_sm_l" type="button" value="Re-activate Membership" name="reinstate" onclick="javascript:mz_change_member_status(1)">
		&nbsp;&nbsp;&nbsp;
		<INPUT class="mz_b_menu_sm_l" type="button" value="Renew Membership" name="renew" onclick="javascript:mz_renew_member()">
		&nbsp;&nbsp;&nbsp; >
		<INPUT class="mz_b_menu_sm_l" type="button" value="Cancel Changes" name="cancel" onclick="javascript:mz_change_member_status(3)"-->
	</td>
	</tr>
	<tr><TD colspan=4>
		<div style="background-color : #7D2308; color : #ffffff; font-size : 10px; padding:2px; text-align:center;">&nbsp</div>
	</TD></tr>
  </tbody>
</table>
<input type="text" name="x_id" hidden>
<input type="hidden" name="x_service_count" value=$kn>
</form>

<script type='text/javascript'>
 document.getElementById("mz_prod_cat_edit_pane").innerHTML.reload;
 
endprint;

$k3=0;

for ($k3==0;$k3<$kn;$k3++)
{
	$k3b=$k3+1;
	$btn_id = "cb".$k3b;
	//echo "..".$btn_id."--".$w_ndx_array[$k3];
	
	if (in_array($w_ndx_array[$k3],$w_user_service_array))
	{
		echo ("document.getElementById(\"$btn_id\").checked = true;");
	}
	
}

echo "</script>";

?>

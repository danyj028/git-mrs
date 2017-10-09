<?php

function get_user_service($f_userid, &$f_user_service_array, &$f_mz_db)
{
	
	$f_sql = "select * from mz_user_service	where user_id = '$f_userid'";
	
	//echo $f_sql;
	
	$w_stm = $f_mz_db->prepare($f_sql);
	$w_stm->execute();
		
		$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);
				
		if  (isset($w_rec) && $w_rec > 0)
		{
			$w_rec_no = $w_stm->rowCount();
			
			$k = 0;
			for ($k==0;$k<$w_rec_no;$k=$k+1)
			{
				$f_user_service_array[$k] = $w_rec["service_id"];
				//$f_user_service_array[$k][1] = $w_rec["tag"];
				$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);
			}
			
			//echo $f_catg_array[1];	
		}	
}

function get_categories($sub_cat, &$f_catg_array, $f_l, &$f_mz_db)
{
	
	if ($f_l == "s")
	{
	  $f_sql = "select * from mz_prod_category  where sub_cat='$sub_cat' and short_list=1 order by tag";
	}
	else
	{
		$f_sql = "select * from mz_prod_category  where sub_cat='$sub_cat' order by tag";
	}
  
	
	$w_stm = $f_mz_db->prepare($f_sql);
		$w_stm->execute();
		
		$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);
				
		if  (isset($w_rec) && $w_rec > 0)
		{
			$w_rec_no = $w_stm->rowCount();
			
			$k = 0;
			for ($k==0;$k<=$w_rec_no;$k=$k+1)
			{
				$f_catg_array[$k][0] = $w_rec["indx"];
				$f_catg_array[$k][1] = $w_rec["tag"];
				$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);
			}
			
			//echo $f_catg_array[1];	
		}	
}

include "connect_to_db.php";

//$w_member_name = "Demo";


/*for ($c=1;$c<5;$c++)
{

$w_cat_array = [];	
get_categories($c, $w_cat_array, $mz_db);

*/

print <<< endprint

<script>
function mz_pc_save_record()
{
	//alert("save_record");
	document.form_pc_edit.submit();
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
	
.mz_b_menu_xsm_l
	{
		background-color:#dddddd;
		color: #000055;
		font-size:0.8em;
		width:90px;
		height:25px;
			
	}		
	
.mz_cb
	{
		font-size:0.9em;	
		vertical-align:baseline;
	}	

.mz_dvc
	{
		height:20px; vertical-align:baseline;
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

<FORM name="form_pc_edit" action="inc/mz_prod_cat_edit_save.php" method="post" enctype="application/x-www-form-urlencoded">
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
      <td>Member: <span style="font-weight:bold;font-size:1.2em;">$this->h_userid</span>
      </td>
    </tr>
    <tr>
    <td colspan=4>Please select product category to associate to your products and services then click [Save Selection] below
    <br>
    <hr>
    </td>
    </tr>
    <tr>
    <!--td>
		<INPUT class="mz_b_menu_xsm_l" type="button" value="More options..." name="select_list" onclick="javascript:mz_select_list('l')">
		&nbsp;&nbsp;&nbsp;
	</td-->
	<tr>
	</tr>
endprint;

$w_user_service_array=[];  //stores user services
$w_ndx_array=[]; //stores cat index

get_user_service($this->h_userid, $w_user_service_array, $mz_db);

$ec = count($w_user_service_array);

$w_sub_cat_array=["Technology", "Product-Function", "Industry", "Services-Other"];
$l=0;

$dvc="<span class=mz_dvc>";
//$dvc="<span>";


for ($c=1;$c<5;$c++)
{

$w_cat_array = [];	
get_categories($c, $w_cat_array, "s", $mz_db);

//for ($k==0;$k<=$w_rec_no;$k=$k+1)

$k=0;
$max = sizeof($w_cat_array);

echo "<tr><td style=\"font-size:1.2em;font-weight:bold;\">".$w_sub_cat_array[$c-1]."</td></tr>";
// ==>
for($k=0;$k<$max-4;$k=$k+4)
{
	$kn=$k+1+$l;
	$ckbx="<input type=checkbox name=cb".$kn." id=ctb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k][0].">";
	echo "<tr><td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".
	$w_cat_array[$k][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=ctb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+1][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+1][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".$w_cat_array[$k+1][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k+1][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=ctb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+2][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+2][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".$w_cat_array[$k+2][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k+2][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=ctb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+3][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+3][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp(".$w_cat_array[$k+3][0].")</td>";
	$w_ndx_array[]=$w_cat_array[$k+3][0];
	
	echo "</tr>";

}

while ($k<$max-1)
{
	$kn=$k+1+$l;
	$ckbx="<input type=checkbox name=cb".$kn." id=ctb".$kn."> ";
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
		<INPUT class="mz_b_menu_sm_l" type="button" value="Save Selection" name="Save" onclick="javascript:mz_pc_save_record()">
		&nbsp;&nbsp;&nbsp;
		<INPUT class="mz_b_menu_sm_l" type="button" value="Cancel" name="delete" onclick="javascript:mz_change_member_status(2)">	
	&nbsp;&nbsp;&nbsp;
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

//echo "ppp".$kn;

for ($k3=0;$k3<$kn;$k3++)
{
	$k3b=$k3+1;
	$btn_id = "ctb".$k3b;
	echo ("document.getElementById(\"$btn_id\").checked = false;");
}

$k3=0;

for ($k3=0;$k3<$kn;$k3++)
{
	$k3b=$k3+1;
	$btn_id = "ctb".$k3b;
	//echo "..".$btn_id."--".$w_ndx_array[$k3];
	
	if (in_array($w_ndx_array[$k3],$w_user_service_array))
	{
		echo ("document.getElementById(\"$btn_id\").checked = true;");
		//echo $w_ndx_array[$k3]."ll";
	}
	
}

echo "</script>";


?>

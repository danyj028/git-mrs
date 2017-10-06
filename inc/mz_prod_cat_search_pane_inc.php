<?php

function get_user_service($f_userid, &$f_user_service_array, &$f_mz_db)
{
	
	$f_sql = "select * from mz_user_service	where user_id = '$f_userid'";
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

<script language="javascript">
function mz_pc_save_record()
{
	//alert("save_record");
	document.form_pc_edit.submit();
}

function more_options()
{
	alert("We are still working on this! You can help us!");
	/*javascript:mz_select_list('l') */
}	
</script>
	

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

		
<FORM name="cat_search_form" action="mz_prod_cat_search.php" method="post" enctype="application/x-www-form-urlencoded">
	
	<!--input type="hidden" name="x_userid" value="no_name"-->
    <table width="98%" align="center" bgcolor="#fefefe" cellpadding="3" style="font-size: 12px;margin-top:-1em;">
   <tbody>
	
    
    <!--td>
		<INPUT class="mz_b_menu_xsm_l" type="button" value="More options..." name="select_list" onclick="javascript:more_options()">
		&nbsp;&nbsp;&nbsp;
	</td-->
	<tr>
	</tr>
endprint;

$w_user_service_array=[];  //stores user services
$w_ndx_array=[]; //stores cat index

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
for($k==0;$k<$max-4;$k=$k+4)
{
	$kn=$k+1+$l;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k][0].">";
	echo "<tr><td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp</td>";
	$w_ndx_array[]=$w_cat_array[$k][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+1][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+1][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp</td>";
	$w_ndx_array[]=$w_cat_array[$k+1][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+2][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+2][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp</td>";
	$w_ndx_array[]=$w_cat_array[$k+2][0];
	
	$kn=$kn+1;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k+3][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k+3][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp</td>";
	$w_ndx_array[]=$w_cat_array[$k+3][0];
	
	echo "</tr>";

}

while ($k<$max-1)
{
	$kn=$k+1+$l;
	$ckbx="<input type=checkbox name=cb".$kn." id=cb".$kn."> ";
	$cbndx="<input type=hidden name=cbndx".$kn." value=".$w_cat_array[$k][0].">";
	echo "<td class=mz_cb>".$kn.": ".$ckbx.$dvc.$w_cat_array[$k][1]."</span>".$cbndx."&nbsp;&nbsp;&nbsp</td>";
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

	
  </tbody>
</table>
<input type="text" name="x_id" hidden>
<input type="hidden" name="x_service_count" value=$kn>
</form>


endprint;



?>

<?php

require_once "connect_to_db1.php";

$w_service_array = array();

$w_userid = urldecode($_REQUEST["x_userid"]);
$w_scount = urldecode($_REQUEST["x_service_count"]);

/*$w_cb1 = 0;
if (isset($_REQUEST["cb1"]))
{
	$w_cb1 = $_REQUEST["cb1"];
}
$w_cbndx1=$_REQUEST["cbndx1"];

echo $w_cb1, $w_cbndx1, $w_userid, $w_scount."..";
*/

$k=1;
for ($k==1;$k<=$w_scount;$k++)
{
	
	$w_cbxndx="cb".$k;
	$w_cbxndx2="cbndx".$k;
	if (isset($_REQUEST[$w_cbxndx]))
	{
		$w_cbndx = $_REQUEST[$w_cbxndx2];
	
		//echo $w_cbxndx.":".$w_cbndx."<br>";
		$w_service_array[]=$w_cbndx;
	}	
}

$w_ar_count= count($w_service_array);

$k2=0;

// delete existing entries for user if present.
$w_query0 = "delete from mz_user_service where user_id = '$w_userid'";

//$mz_db->beginTransaction();
$w_stm0 = $mz_db->prepare($w_query0);
$w_stm0->execute();

for ($k2==0;$k2<$w_ar_count;$k2++)
{
//Save data
$w_query = "insert into mz_user_service values($w_userid, $w_service_array[$k2])";
//echo $w_query."<br>";
$w_stm = $mz_db->prepare($w_query);
$w_stm->execute();

}

//$mz_db->commit();


print <<< endprint

<script type/text="javascript">
alert("Data saved. Continue");
window.history.back();
</script>

endprint;



//echo "Data saved";
?>

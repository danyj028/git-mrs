<?php

require_once "tk_db_connect.php";

$w_ref = "";
if (isset($_REQUEST["x_ref"]))
{
	$w_ref = urldecode(($_REQUEST["x_ref"]));
}

$w_fname = urldecode($_REQUEST["x_fname"]);
$w_surname = urldecode($_REQUEST["x_surname"]);
$w_email_add = urldecode($_REQUEST["x_email_add"]);
$w_phone = urldecode($_REQUEST["x_phone"]);
$w_addr_num = urldecode($_REQUEST["x_addr_num"]);
$w_addr_street = urldecode($_REQUEST["x_addr_street"]);
$w_addr_suburb = urldecode($_REQUEST["x_addr_suburb"]);
$w_addr_pcode = urldecode($_REQUEST["x_addr_pcode"]);
$w_addr_map = urldecode($_REQUEST["x_addr_map"]);
$w_addr_mapref = urldecode($_REQUEST["x_addr_mapref"]);
$w_SD = urldecode($_REQUEST["x_SD"]);
$w_di = urldecode($_REQUEST["x_deliv_inst"]);
$w_login_name = urldecode($_REQUEST["x_login_name"]);
$w_pword = urldecode($_REQUEST["x_pword"]);
$w_find_us = urldecode($_REQUEST["x_find_us"]);
$w_re = urldecode($_REQUEST["x_spec_off"]);

$w_re = 0;
if ($w_re == "on")
{
	$w_re = 1;
}



$w_map_ref = $w_SD."-".$w_addr_map."-".$w_addr_mapref;

$w_add1 = $w_addr_num;
$w_add2 = $w_addr_street;
$w_query = "select p_id from tk_patron where p_email = '$w_email_add' ";
$w_res = $tk_db->query($w_query);
$w_row = $w_res->fetchRow();

if ($w_row <> "")
{
	//already there
	echo "<br>Aready in there";
}
else
{
	// get new id

	$w_qs = "start transaction";
	$w_q1 = "update tk_data_id set tk_id_value = tk_id_value+1 where tk_id_key = 'pid' ";
	$w_q2 = "select tk_id_value from tk_data_id where tk_id_key = 'pid' ";
	$w_qe = "commit";

	$tk_db->exec($w_qs);
	$tk_db->exec($w_q1);
	$w_res = $tk_db->query($w_q2);
	$tk_db->exec($w_qe);

	$w_row = $w_res->fetchRow();
	$w_pid = $w_row["tk_id_value"];

	//insert patron record
	$w_query = "insert into tk_patron values('$w_pid','$w_surname','$w_fname','','$w_add1','$w_add2','','$w_addr_suburb','','$w_addr_pcode','$w_phone','$w_email_add','','1','$w_di','$w_re','$w_map_ref') ";

	$tk_db->exec($w_query);

	echo "<br>Record saved";

	//insert user_auth_db record
	$w_salt = strtoupper(substr($w_login_name, 0,2));
	//$w_cpword = crypt($w_pword, $w_salt);
	$w_cpword = substr(md5($w_login_name.$w_pword),0,20);

	$w_query="insert into tk_auth_db values('$w_pid', '$w_login_name', '$w_cpword', '1','','t','1')";

	//echo $w_query;

	$tk_db->exec($w_query);

}

?>
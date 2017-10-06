<?php

require_once "tk_db_connect.php";

$w_login_name = $_COOKIE["tk_loginname"];

$w_pid = urldecode($_REQUEST["x_patron_id"]);
$w_email_add = urldecode($_REQUEST["x_email_add"]);
$w_phone = urldecode($_REQUEST["x_phone"]);
$w_addr_num = urldecode($_REQUEST["x_addr_num"]);
$w_addr_street = urldecode($_REQUEST["x_addr_street"]);
$w_addr_suburb = urldecode($_REQUEST["x_addr_suburb"]);
$w_addr_pcode = urldecode($_REQUEST["x_addr_pcode"]);
$w_addr_map = urldecode($_REQUEST["x_addr_map"]);
$w_addr_mapref = urldecode($_REQUEST["x_addr_mapref"]);
$w_SD = urldecode($_REQUEST["x_sdir"]);
$w_di = urldecode($_REQUEST["x_deliv_inst"]);
$w_old_password = urldecode($_REQUEST["x_old_password"]);
$w_pword = urldecode($_REQUEST["x_pword"]);
$w_re = urldecode($_REQUEST["x_spec_offer"]);

$w_map_ref = $w_SD."-".$w_addr_map."-".$w_addr_mapref;

$w_add1 = $w_addr_num;
$w_add2 = $w_addr_street;
$w_query = "select p_id from tk_patron where p_email = '$w_email_add' ";
$w_res = $tk_db->query($w_query);
$w_row = $w_res->fetchRow();

$w_error = "";

if ($w_row == "")
{
	//not found
	echo "<br>There was an error, data cannot be updated.";
}
else
{
	// update record

	//check for password change
	if ($w_old_password <> "")
	{
		//check old password
		$w_salt = strtoupper(substr($w_login_name, 0,2));
		$w_enc_old_password = substr(md5($w_login_name.$w_old_password),0,20);
		$w_query = "select * from tk_auth_db where id = '$w_pid' and password = '$w_enc_old_password' ";
		$w_res = $tk_db->query($w_query);
		$w_row = $w_res->fetchRow();

		if ($w_row["id"] <> "")  // good old password
		{
			//update Password
			$w_enc_new_password = substr(md5($w_login_name.$w_pword),0,20);
			$w_query = "update tk_auth_db set password = '$w_enc_new_password' where id ='$w_pid' ";
			$tk_db->exec($w_query);
			$w_error = "Password updated.";
		}
		else
		{
			$w_error = "Password not updated. Please check old and new passwords.";
		}
		//$w_error ="here!!!"	;
	}
	else
	{
		$w_error = "Details updated.";
	}

	$w_map_ref = $w_SD."-".$w_addr_map."-".$w_addr_mapref;
	$w_query2 = "update tk_patron set p_email = '$w_email_add', p_phone='$w_phone',
				p_add_1 ='$w_addr_num', p_add_2 ='$w_addr_street',
				p_city ='$w_addr_suburb', p_pcode ='$w_addr_pcode',
				p_mapref ='$w_map_ref', p_di = '$w_di', p_recv_email ='$w_re'
				where p_id = '$w_pid' ";

	$tk_db->exec($w_query2);

}

 print <<< endprint

	$w_error

endprint;


?>
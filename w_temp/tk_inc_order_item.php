<?php

require_once "tk_db_connect.php";

$w_sessid = $_GET["x_sessid"];
$w_m_id = $_GET["x_m_id"];
$w_m_change = $_GET["x_change"];

if ($w_m_change==1)
{
	$w_query = "update tk_order_temp set tk_o_qty = tk_o_qty+1 where tk_o_session = '$w_sessid' and tk_o_m_id = '$w_m_id'";
	$tk_db->exec($w_query);
}
else
{
	$w_query = "select tk_o_qty from tk_order_temp where tk_o_session = '$w_sessid' and tk_o_m_id = '$w_m_id'";

	$w_res = $tk_db->query($w_query);
	$row = $w_res->fetchRow();

	$w_qty = $row["tk_o_qty"];

	if ($w_qty == 1) //only 1 left - decreasing is deleting!
	{
		$w_query = "delete from tk_order_temp where tk_o_session = '$w_sessid' and tk_o_m_id = '$w_m_id'";
	}
	else
	{
		$w_query = "update tk_order_temp set tk_o_qty = tk_o_qty-1 where tk_o_session = '$w_sessid' and tk_o_m_id = '$w_m_id'";
	}
	$tk_db->exec($w_query);
}


?>
<?php

require_once 'tk_db_connect.php';

/* initialise some data */
$w_query = "select * from tk_data_list where tk_data_type = 'fee'";
$f_res =& $tk_db->query($w_query);

while ($row = $f_res->fetchRow())
{
	$a_key = $row["tk_data_key"];
	$a_value = $row["tk_data_value"];
	$w_cost_key[] =  $a_key;
	$w_cost_value[] = $a_value;
}
$w_cost = array_combine($w_cost_key, $w_cost_value);

$bdf = sprintf("%01.2f",$w_cost["bdf"]);
$rpf = $w_cost["rpf"];
$zpf = $w_cost["zpf"];

$f_k = $f_t = $f_md = $f_o_t_price = 0;
$confirm_button = "";

for ($k=0;$k<4;$k++)
{
	$w_zone_k[$k] = 0;
}

$w_sessid = $_GET["x_sessid"];

$w_query = "select * from tk_order_temp join tk_menu_item on tk_o_m_id = m_id join tk_menu_price on p_m_id = m_id where tk_o_session = '$w_sessid' order by tk_o_r_id";


$f_res =& $tk_db->query($w_query);

if ($f_res->numRows() == 0)
	{
		echo ("<div style=\"line-height:25px;\">You do not have any item on order at this time.</div>");
		echo ("<INPUT type=\"hidden\" name=\"x_order_no_exist\" value=\"1\">");
		echo ("<INPUT type=\"hidden\" name=\"x_order_exist\" value=\"0\">");
	}
	else
	{
		echo ("<table width=\"100%\" cellpadding=\"3\" border=\"0\">");
		echo ("<th align=\"left\">Item (qty)</th><th align=\"right\">Price</th><th align=\"right\">Total</th><th align=\"center\"  style=\"font-size:10px;color:#880000;\">&nbsp;</th>");

		while ($row = $f_res->fetchRow())
		{
			$f_md++;
			$f_m_id = $row["tk_o_m_id"];
			$f_m_name = $row["m_name"];
			$f_m_desc = substr($row["m_description"], 2, -2);
			$f_menu_price = $row["p_m_base_price"];
			$f_m_qty = $row["tk_o_qty"];
			$f_r_array[] = $row["tk_o_r_id"]; //restaurant id placed in array
			$f_o_r_zone = $row["tk_o_r_zone"]; //restaurant zone
			$w_zone_k[$f_o_r_zone] = 1; // zone count;

			$f_m_t_price = sprintf("%01.2f",$f_m_qty*$f_menu_price);
			$f_o_t_price += $f_m_t_price;
			$f_o_t_price = sprintf("%01.2f",$f_o_t_price);


			echo "<tr>
			<td width=\"50%\">
			<a href=\"javascript:show_item($f_md)\" style=\"color:#000055;\">$f_m_name </a>($f_m_qty)
			<br>
			<div id=\"$f_md\" style=\"background-color:#bbeebb;font-size:12px;color:#004400;visibility:hidden;display:none;padding:3px;border-right-style:solid;border-bottom-style:solid;border-right-width:1px;border-bottom-width:1px;\">
			<a href=\"javascript:hide_me($f_md)\" style=\"color:#aa0000;\">[X]</a>&nbsp;$f_m_desc
			</div>
			<td align=\"right\" valign=\"top\" width=\"15%\">$ $f_menu_price</td>
			</td><td align=\"right\" valign=\"top\" width=\"15%\">$ $f_m_t_price</td>
			</td><td align=\"center\" valign=\"top\" width=\"20%\">
			<div>
			<a href=\"javascript:inc_item('$f_m_id','1')\"><IMG src=\"images/tk_inc_icon.gif\" alt=\"Increase quantity\" align=\"top\"  border=\"0\"></a>
			<a href=\"javascript:inc_item('$f_m_id','-1')\" style=\"position:relative:right:+2px;\"><IMG src=\"images/tk_dec_icon.gif\" alt=\"Decrease quantity\"  align=\"top\" border=\"0\"></a>
            <a href=\"javascript:del_item('$f_m_id')\"><IMG src=\"images/tk_del_icon.gif\" alt=\"Delete\" align=\"top\" border=\"0\"></a>
            </div>
			</td>
			</tr>";
		}
		echo "<tr><td  colspan=\"2\" style=\"border-bottom-style:solid;border-bottom-width:2px;font-size:12px;font-weight:bold;\">Total</td>
		<td align=\"right\" style=\"border-bottom-style:solid;border-bottom-width:2px;font-size:12px;font-weight:bold;\">$ $f_o_t_price</td>
		<td></td>
		</tr>";
		echo ("<INPUT type=\"hidden\" name=\"x_order_exist\" value=\"1\">");
	}



if ($f_o_t_price > 0)
{

	$r_k = count(array_unique($f_r_array));
	$z_k = 0;

	for($k=0;$k<4;$k++)  //checking zones.
	{
		$z_k = $z_k+$w_zone_k[$k];
	}

	$t_rpf = sprintf("%01.2f",($rpf * $r_k));
	$t_zpf = sprintf("%01.2f",($zpf * $z_k));
	$t_df = $bdf + $t_rpf + $t_zpf;
	$t_df = sprintf("%01.2f",$t_df);
	$amt_due = $f_o_t_price + $t_df;
	$amt_due = sprintf("%01.2f", ($f_o_t_price + $t_df));

	print <<< endprint

	<tr><td colspan=3><span style="font-weight:bold;">Delivery</span></td></tr>

<!--table width="100%"-->
<tr><td width="50%">Base Delivery Fee:</td><td width="20%" align="right">$ $bdf </td><td></td><td></td</tr>
<tr><td width="50%">Restaurant Pickup Fee:</td><td width="20%" align="right">$ $t_rpf</td><td></td><td></td</tr>
<tr><td width="50%">Zone Pickup Fee:</td><td width="20%" align="right">$ $t_zpf</td><td></td><td></td</tr>
<tr><td colspan="2" style="font-weight:bold;">Total Delivery Fee:</td>
<td width="20%" align="right" style="font-weight:bold;">$ $t_df</td><td></td><td></td</tr>
<tr><td colspan=2  style="font-weight:bold;font-size:14px;border-top-style:solid;border-top-width:2px;">Total Amount Due<br>(inc. GST)</td>
<td align="right" style="font-weight:bold;font-size:14px;border-top-style:solid;border-top-width:2px;">$ $amt_due</td><td></td</tr>

endprint;

//$confirm_button = "<div align=\"right\"><INPUT type=\"button\" name=\"payment\" value=\"Confirm Order\" alt=\"[Confirm Order]\" onclick=\"tk_confirm_order()\" style=\"background-color:#008800;color:#ffffff;height:20px;font-size:12px;\"></div>";

echo ("</table><br>");


}

?>

<div style=""></div>
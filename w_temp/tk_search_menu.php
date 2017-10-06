<?php

function get_show_selection(&$f_tk_db, &$f_query, $w_session_id)
{

	// get zone color
	$w_query = "select tk_data_value from tk_data_list where tk_data_type = 'zon' order by tk_data_key;";
	$f_res =& $f_tk_db->query($w_query);

	while ($row = $f_res->fetchRow())
	{
		$f_zone_array[] = $row["tk_data_value"];  //get zone color
	}

	//$f_zone_array = array("#00aa00","#0000FF","purple");

	$f_res =& $f_tk_db->query($f_query);

	if ($f_res->numRows() == 0)
	{
		echo ("There are no menu items matching your selection.<br>Please make another selection and search again.");;
	}
	else
	{
		//echo ("<table width=\"100%\" style=\"color:#006600;\"><tr>");
		echo ("<INPUT type=\"hidden\" name=\"x_m_qty\" value=\"0\">");
		echo ("<table width=\"100%\" style=\"color:#006600;\"><tr>");

		$f_k = $f_t = $f_md = 0;

		while ($row = $f_res->fetchRow())
		{
			$f_k++;
			$f_md++;
			$f_m_id = $row["m_id"];
			$f_m_name = $row["m_name"];
			$f_m_cuisine = $row["m_cuisine_desc"];
			$f_m_name = $row["m_name"];
			$f_m_desc = substr($row["m_description"], 2, -2);
			$f_menu_jpg = "images/tk_menu_pics/".$f_m_id.".jpg";
			$f_menu_price = $row["p_m_base_price"];
			$f_m_r_id = $row["r_id"];
			$f_m_restaurant = $row["r_name"];
			$f_m_r_zone = $row["r_zone"] -1 ;

			$f_qty_tag = "x_qty".$f_k;
			$f_x_qty = "x_m_qty".$f_k;
			$f_r_zone = $f_zone_array[$f_m_r_zone];

			if (!file_exists($f_menu_jpg))
			{
				$f_menu_jpg = "images/tk_menu_pics/takein_plate_2s.jpg";
			}

			print <<< end_item
			<td valign="top" width="33%" style="border-bottom-color : #119300; border-bottom-style : dotted; border-bottom-width : 2px; border-right-color : #119300; border-right-style : dotted; border-right-width : 2px;">
			<div style="background-color:$f_r_zone;height:12px;font-size:8px;color:#ffffff;text-align:left;">
			Pickup Zone Colour
			</div>
			<table>
			<tr><td style="height:120px;">
			<a href="javascript:show_item($f_md)"><IMG src="$f_menu_jpg" align="left" valign="top" border="0" width="120px" alt="Menu item"></a>
			</td>
			<td valign=top>

			<div style="font-size:12px;color:#880000;text-align:center;">$ $f_menu_price</span>
			<br>

			<div style="font-size:10px; height:12px;">
			<INPUT type="hidden" name="$f_x_qty">
			Qty: <INPUT type="text" name="$f_qty_tag" value="1" size="2" maxlength="2"  style="background-color:#d0e7bf;height:12px; font-size:10px;" onchange="javascript:eval(document.form1.$f_x_qty.value=this.value)">
			</div>

			<div align="center" style="position:relative;top:+10px;">
			<a href="javascript:w_qty=eval(document.form1.$f_x_qty.value);order_item('$f_m_id',w_qty,'$f_menu_price','$w_session_id','$f_m_r_id','$f_m_r_zone')">
			<IMG src="images/tk_order_0.jpg" align="center" valign="top" border="0" alt="Menu item"></a> </div>
			<!--span style="font-size:10px;color:#008800;">Options:</span-->
			</td>
			</tr>
			<tr>
			<td colspan=2>
			<a href="javascript:show_item($f_md)" style="color:#008800;font-size:12px;font-weight:bold;">$f_m_name</a> <span style="font-size:10px;color:#008800;">($f_m_id)</span><br>
			<div id="$f_md" style="background-color:#bbeebb;font-size:12px;color:#004400;visibility:hidden;display:none;padding:3px;border-right-style:solid;border-bottom-style:solid;border-right-width:1px;border-bottom-width:1px;"><a href="javascript:hide_me($f_md)" style="color:#aa0000;">[X]</a>&nbsp;$f_m_desc</div>
			<span style="color:#880000;font-size:10px;">Offered by <a href=javascript:show_rest() style="color:#880000;font-size:10px;font-weight:bold;">$f_m_restaurant</a></span><br>

			</td>
			</tr></table>
			</td>

end_item;
			if ($f_k == 3)
			{
				$f_k = 0;
				echo("</tr><tr>");
			}
		}
		echo ("</tr></table>");
	}
}

function get_control_panel($w_cp)
{
}

// SCRIPT Starts here *******************************************

ob_start(); // will be used later
session_start();
ob_end_flush();  // will be used later

require_once 'tk_db_connect.php';

$w_home = "takein.html";
if (isset($_REQUEST["x_patron"]))
{
	$w_home = "tk_patron_home.php";
}


$w_self = $_SERVER['PHP_SELF'];

$w_top_cui = $w_top_dish = $w_top_i1 = $w_top_i2 = $w_top_rest = "";
$w_control_panel = "";

if (!isset($_GET["x_cuisine"]))
{
	$w_head = "Search our Extensive Menu. Select criteria for search, then click [Search].";
	$w_panel_head = "";
	$w_query = ""; // no query done.

	$w_panel_text = <<< end_text
	<div align=center>
	<div style="text-align:left;width:70%;font-size:16px;color:#880000">
	<ul>
   <li><p>Select search criteria on the left.  For example select Cuisine, then Chinese to search for Chinese food.</P></li>
   <li><p>Click [Search].</P></li>
   <li><p>Try different search criteria to find the best offer for you. </P></li>
   <li><p>When search result is displayed, click [Order] next to selected item to place an order.</li>
 </ul>
	</div></div>
end_text;

}
else
{
	$w_panel_text = "";
	$w_head = "<table width=100%><tr><td width=80%>Please search our extensive menu, select from displayed menu items, then place your order.</td><td width=* align=\"right\"> <INPUT type=\"image\" name=\"show_order\" value=\"Show My Order\" alt=\"Show My Order\" src=\"images/show_order_0.jpg\" onclick=\"show_order('$PHPSESSID')\"></td></tr></table>";

	/*$w_head = "<table width=100%><tr><td width=80%>Please search our extensive menu, select from displayed menu items, then place your order.</td><td width=* align=\"right\"> <INPUT type=\"button\" name=\"show_order\" value=\"Show my Order\" alt=\"Show My Order\" style=\"background-color:#BD0808; color:#ffffff;height:24px; width:100px; font-size: 12px;font-weight:bold;\" onclick=\"show_order()\"></td></tr></table>";*/
	// we do a search

	// initialise queries.
	$w_cuisine_q = $w_category_q = $w_main_ing_q = $w_ing2_q = $w_d_ingredient=$w_restaurant_q = $w_show_limit_q = "";

	$w_cuisine = urldecode($_GET["x_cuisine"]);
	$w_dish = urldecode($_GET["x_dish"]);
	$w_ingredient1 = urldecode($_GET["x_ingredient"]);
	$w_ingredient2 = urldecode($_GET["x_ingredient2"]);
	$w_d_ingredient = urldecode($_GET["x_d_ingredient"]);
	$w_restaurant = urldecode($_GET["x_restaurant"]);
	$w_show_limit = urldecode($_GET["x_show_limit"]);


	if ($w_cuisine <> "all")
	{
		$w_cuisine_q = " and m_cuisine_key = '".$w_cuisine."'";
		$w_query = "select * from tk_data_list where tk_data_type='cui' and tk_data_key = '$w_cuisine'";

		//echo $w_query; die();
		$w_top =& $tk_db->query($w_query);
		$row = $w_top->fetchRow();
		$w_top_cui = "<option value=".$w_cuisine.">".$row["tk_data_value"]."</option>";

	}
	if ($w_dish <> "all")
	{
		$w_category_q = " and m_category_key = '".$w_dish."'";
		$w_query = "select * from tk_data_list where tk_data_type='cat' and tk_data_key = '$w_dish'";

		$w_top =& $tk_db->query($w_query);
		$row = $w_top->fetchRow();
		$w_top_dish = "<option value=".$w_dish.">".$row["tk_data_value"]."</option>";
	}
	if ($w_ingredient1 <> "all")
	{
		$w_main_ing_q = " and m_ingred1_key = '".$w_ingredient1."'";
	}
	if ($w_ingredient2 <> "all")
	{
		$w_ing2_q = " and m_ingred2_key = '".$w_ingredient2."' or m_ingred3_key = '".$w_ingredient2."'";
	}
	if ($w_d_ingredient <> "all")
	{
		$w_main_ing_q = " and m_ingred1_key = '".$w_d_ingredient."'";
		$w_ing2_q = "";  //force second ingredient to be null if dessert chosen
		$w_category_q = " and m_category_key = 'des'"; //force it to be a dessert
	}
	if ($w_restaurant <> "all")
	{
		$w_restaurant_q = " and m_r_id = '".$w_restaurant."'";
	}
	if ($w_show_limit <> "all")
	{
		$w_show_limit_q = " limit $w_show_limit";
	}

	//$w_query = "select * from tk_menu_item where true";
	//$w_query .= $w_cuisine_q.$w_category_q.$w_main_ing_q.$w_ing2_q.$w_restaurant_q;
	//$w_query .= " order by m_ingred1_key".$w_show_limit_q;
	$w_panel_head = "";

	$w_query = "select * from tk_menu_item as tk_i
				join tk_restaurant as tk_r on  tk_i.m_r_id = tk_r.r_id
				join tk_menu_price as tk_p on tk_p.p_m_id = tk_i.m_id
				where true".$w_cuisine_q.$w_category_q.$w_main_ing_q.$w_ing2_q.$w_restaurant_q;
	$w_query .= " order by m_ingred1_key".$w_show_limit_q;

	//	echo $w_query; die();

	if (isset($_COOKIE["loginname"]))
	{
		get_control_panel(&$w_cntrol_panel);
	}
	// query string used later.
}

print <<< endprint

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>TakeIn Search Menu</title>
</head>
<script type="text/javascript" src="tk_ajax_f_01.js"></script>

<script language="javascript">

var x_m_qty = 1;

function menu_search()
{
	document.form1.submit();
}

function hide_me(w_el)
{
	d1 = document.getElementById(w_el);
	d1.style.visibility="hidden";
	d1.style.display="none"
}

function show_item(w_el)
{
	v =  document.getElementById(w_el).style.visibility;

	if (v == "visible")
	{
		hide_me(w_el);
	}
	else
	{
		d1 = document.getElementById(w_el);
		d1.style.visibility="visible";
		d1.style.display="block";
	}
}

function order_item(w_m_id, w_qty, w_price, w_session_id, w_r_id, w_r_zone )
{
	if (w_qty==null)
	{
		w_qty=1;
	}
	tk_order_item(w_m_id, w_qty, w_price, w_session_id, w_r_id, w_r_zone);
}

function show_order(w_sessid)
{

	w_url = "/takein/tk_show_order.php?x_sessid="+w_sessid;
	//window.open(w_url,"My_Order","width=640, height=480, scrollbars=yes, menubar=0, statusbar=0");
	window.open(w_url,"My_Order","width=760, height=540, scrollbars=yes, menubar=0, statusbar=0");

}

function show_rest()
{
	alert("show_restaurant");
	restaurant_window = 	window.open("/el01/el_tools/el_s_an_display.php?x_userid=w_userid","Announcement","width=320, height=220");
}
</script>

<body bgcolor="#ffffff">
<font color="#005500">
<div style="background-color : #d0e7bf; color : #005500; font-size : 10px; height : 15px; position : relative; text-align : center; top : -5px; vertical-align : middle; word-spacing : 15px;">
		<!--a href=info/tk_faq.html style="color:#005500;">FAQ</a-->
		<a href=$w_home style="color:#005500;">Home</a>
		<a href=info/tk_rates.html style="color:#005500;">Delivery_Info_&_Rates</a>
		<a href=info/tk_delivery.html style="color:#005500;">Delivery_Area</a>
		<a href=info/tk_contact.html style="color:#005500;">Contact_TakeIn</a>
		<a href=info/tk_partner.html style="color:#005500;">Partner_Login</a>
		<a href=info/tk_faq.html style="color:#005500;">Help</a>
</div>
 <table width="100%" cellpadding="1" cellspacing="1" border="0" style="text-align: center;">
        <tbody>
          <tr>
			<td><span style="font-size:16pt;font-weight: bold; color:#005500;">
		<IMG src="images/search_menu_s_15y.jpg" align="left" border="0" alt="Search Menu"></span>
			</td>
			<td>
			$w_control_panel
			</td>
		<tD style="vertical-align: top; text-align: right;"><img  src="images/takein_logo_01-18.png" style="border: 0px solid;" alt="TakeIn">
			</td>
          </tr>
        </tbody>
 </table>

<div style="background-color : #d0e7bf;font-size : 14px; color: #005500; padding:5px; text-align:left; ">
$w_head
<hr>
<FORM name="form1" action="$w_self" method="get" enctype="application/x-www-form-urlencoded">
<!--FORM name="form1" action="x_var_test.php" method="get" enctype="application/x-www-form-urlencoded"-->
    <table width="100%" align="center" bgcolor="#d0e7bf" cellpadding="3" style="font-size: 14px;">
   <tbody>
   <tr>
		<td width="20%" valign ="top">
   <table width="20%" align="left">
   <tr>
   	<TD width="20%" style="background-color : #FF6430;font-weight:bold;" height="30px" align="center">Cuisine
	<br><SELECT name="x_cuisine" style="height:20px; background-color : #d0e7bf; font-size:12px; color:#004400; width:120px;">
	$w_top_cui
   <option value="all">No Preference</option>

endprint;

//get cuisine menu
$res =& $tk_db->query("SELECT tk_data_value, tk_data_key FROM tk_data_list where tk_data_type='cui' and tk_data_status = '1' order by tk_data_value");

	while ($row = $res->fetchRow())
	{
   echo ("<option value=".$row["tk_data_key"].">".$row["tk_data_value"]."</option>");
}

   print <<< endprint

 </SELECT>
</TD>
</tr>
<tr>
 	<TD width="20%" style="background-color : #FFBC57;font-weight:bold;" height="30px" align="center">Dish<br><SELECT name="x_dish" style="height:20px; background-color : #d0e7bf; font-size:12px;color:#004400; width:120px;">
 	$w_top_dish
	<option value="all">No Preference</option>

endprint;

//get dish menu
$res =& $tk_db->query("SELECT tk_data_value, tk_data_key FROM tk_data_list where tk_data_type='cat' and tk_data_status = '1' order by tk_data_value");

	while ($row = $res->fetchRow())
	{
   echo ("<option value=".$row["tk_data_key"].">".$row["tk_data_value"]."</option>");
	}

   print <<< endprint

</SELECT></TD>
</tr>
<tr>
	<TD width="20%" style="background-color : #3CD927;font-weight:bold;" height="30px" align="center">Main Ingredient<br><SELECT name="x_ingredient" style="height:20px; background-color : #d0e7bf; font-size:12px; color:#004400; width:120px;">
	<option value="all">No Preference</option>

endprint;

	//get main ingredient
$res =& $tk_db->query("SELECT tk_data_value, tk_data_key FROM tk_data_list where tk_data_type='ing' and tk_data_status = '1' order by tk_data_value");

	while ($row = $res->fetchRow())
	{
   echo ("<option value=".$row["tk_data_key"].">".$row["tk_data_value"]."</option>");
	}

   print <<< endprint
<option value="other">Other</option>
</SELECT></TD>
</tr>
<tr>
	<TD width="20%" style="background-color : #899849;font-weight:bold;" height="30px" align="center">Other Ingredient<br><SELECT name="x_ingredient2" style="height:20px; background-color : #d0e7bf; font-size:12px; color:#004400; width:120px;">
	<option value="all">No Preference</option>

endprint;

	//get other ingredient
$res =& $tk_db->query("SELECT tk_data_value, tk_data_key FROM tk_data_list where tk_data_type='ing' and tk_data_status <= '2' order by tk_data_value");

	while ($row = $res->fetchRow())
	{
   echo ("<option value=".$row["tk_data_key"].">".$row["tk_data_value"]."</option>");
	}

   print <<< endprint
	<option value="other">Other</option>
</SELECT></TD>
</tr>
<tr>
<TD width="20%" style="background-color : #FFE044;font-weight:bold;" height="30px" align="center">Dessert Ingredient<br><SELECT name="x_d_ingredient" style="background-color : #d0e7bf; color : #004400; font-size : 12px; height : 20px; width : 120px;">
	<option value="all">No Preference</option>

endprint;

	//get dessert ingredient
$res =& $tk_db->query("SELECT tk_data_value, tk_data_key FROM tk_data_list where tk_data_type='ing' and tk_data_status = '3' order by tk_data_value");

	while ($row = $res->fetchRow())
	{
   echo ("<option value=".$row["tk_data_key"].">".$row["tk_data_value"]."</option>");
	}

   print <<< endprint
	<option value="other">Other</option>
</SELECT></TD>
	</tr>
<tr>
<TD width="20%" style="background-color : #FFF3DC;font-weight:bold;" height="30px" align="center">Restaurant<br><SELECT name="x_restaurant" style="background-color : #d0e7bf; color : #004400; font-size : 12px; height : 20px; width : 120px;">
	<option value="all">No Preference</option>
endprint;

	//get Restaurant list
$res =& $tk_db->query("SELECT r_id, r_name FROM tk_restaurant where r_status = '1' order by r_name");

	while ($row = $res->fetchRow())
	{
   echo ("<option value=".$row["r_id"].">".$row["r_name"]."</option>");
	}

   print <<< endprint

</SELECT></TD>
	</tr>
<tr><TD>
<div>
<INPUT type="button" name="x_search" value="Search" onclick="javascript:menu_search()" style="background-color:#FFFF00; color:#00007B;height:24px; width:150px; font-size: 14px;font-weight:bold;">
<div style="font-size:12px">Max. menu items to show:<br>
12<INPUT type="radio" checked name="x_show_limit" value="12" style="height:10px; width:10px;">
24<INPUT type="radio" name="x_show_limit" value="24" style="height:10px; width:10px;">
36<INPUT type="radio" name="x_show_limit" value="36" style="height:10px; width:10px;">
All<INPUT type="radio" name="x_show_limit" value="all" style="height:10px; width:10px;"> <div>
</div>
</td>
</tr>
	</table>
	</td>
		<td rowspan=7 valign="top" style="text-align:justify; font-size:16px; color:#660000; background-color:#ffffff;">
	$w_panel_head
	$w_panel_text

endprint;

if ($w_query <> "")
{
	get_show_selection($tk_db, $w_query, $PHPSESSID);
}

print <<< endprint
	</td>
	</tr>
	</tbody>
</table>
<hr>
</div>

</form>
</font>

</body>
</html>
endprint;

?>

<div style="border-top-width : 1px;">

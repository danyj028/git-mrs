<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>My_Order</title>
</head>
<script type="text/javascript" src="tk_ajax_f_01.js"></script>
<body>
<table width="100%" cellpadding="1" cellspacing="1" border="0" style="text-align: center;">
		<tbody>
          <tr>
			<td><span style="font-size:16pt;font-weight: bold; color:#005500;">
		<IMG src="images/order_12_0.jpg" align="left" border="0" alt="Order"></span>
			</td>
			<td>
			</td>
		<tD style="vertical-align: top; text-align: right;"><img  src="images/takein_logo_01-12.jpg" width="120" border="0" alt="takein">
			</td>
          </tr>
        </tbody>
 </table>

<div style="background-color : #d0e7bf;font-size : 14px; color: #005500; padding:5px; text-align:left; ">
<table width=100%><TR><TD style="font-weight:bold">Your Order is shown below:
</TD>
<td align="right"><a href="javascript:document.location.reload()" style="font-size:10px;">[Refresh Screen]</a>&nbsp;&nbsp;
<INPUT type="button" value="Close" style="background-color:#aa0000;color:#ffffff;height:20px;font-size:12px;"  onclick="self.close()"></td>
</TR></table>

<hr>

<div id="order">
<table width="100%">
<tr>
<td width="60%" valign="top">

<?php
$w_sessid = urldecode($_GET["x_sessid"]);

print <<<  endprint

<div id="id1" style="background-color:#ffeeee;color:#000055;font-size:12px;"></div>

<script language="javascript">

var tk_object = new ajax_request();

get_order('$w_sessid');

function get_order(w_sessid)
{

	w_url = "tk_get_order.php?x_sessid="+w_sessid+"&x_rand="+Math.random();

	//orderwin = window.open(w_url,"Order","");

	tk_order = tk_object.open("GET", w_url, true);
	tk_object.onreadystatechange = tk_get_object_response;

	tk_object.send(null);
}


function tk_get_object_response()
{

	if (tk_object.readyState == 4)
	{
		if (tk_object.status == 200)
		{
			var tk_order = tk_object.responseText;
			document.getElementById('id1').innerHTML=tk_order;
		}
		else
		{
			document.getElementById('id1').innerHTML="HTTP Error encountered.";
		}
	}
	else
	{
		w_msg =  "Click [Refresh Screen] to update";
		//document.getElementById('id1').innerHTML="Click [Refresh Screen] to update.";
		document.getElementById('id1').innerHTML=w_msg;
	}

	/*if (document.x_order_exist.value == 1)
	{

		document.getElementById('b1').innerHTML="<INPUT type='button' name='confirm_order' value='Confirm Order' alt='[Confirm Order]' onclick='tk_confirm_order()' style='background-color:#008800;color:#ffffff;height:20px;font-size:12px;'>";
		document.getElementById('b1').innerHTML="dadad";

	}
	else
	{

		document.getElementById('b1').innerHTML="";

	}*/

}


function show_item(w_el)
{
	v = document.getElementById(w_el).style.visibility;

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

function hide_me(w_el)
{
	d1 = document.getElementById(w_el);
	d1.style.visibility="hidden";
	d1.style.display="none"
}

function inc_item(w_m_id, w_change)
{

	if (w_change == 1)
	{
		w_prmpt = "Do you really want to increase the order for this item?";
	}
	else
	{
		w_prmpt = "Do you really want to decrease the order for this item?";
	}


	if (confirm(w_prmpt))
	{
		w_url = "tk_inc_order_item.php?x_sessid=$w_sessid&x_m_id="+w_m_id+"&x_change="+w_change+"&x_rand="+Math.random();
		tk_order_inc = tk_object.open("GET", w_url, false);
		tk_object.send(null);

		tk_object.onreadystatechange = document.location.reload();
	}

}

function del_item(w_m_id)
{

	if (confirm("Do you really want to delete this item from the order?"))
	{
		w_url = "tk_del_order_item.php?x_sessid=$w_sessid&x_m_id="+w_m_id+"&x_rand="+Math.random();
		tk_order_del = tk_object.open("GET", w_url, false);
		tk_object.send(null);

		tk_object.onreadystatechange = document.location.reload();
	}

}

function tk_confirm_order()
{
	//alert("confirm order");

	w_url = "tk_confirm_order.php?x_sessid="+'$w_sessid'+"&x_rand="+Math.random();

	//w2 = window.open(w_url,"Order","");

	tk_order = tk_object.open("GET", w_url, true);
	tk_object.onreadystatechange = tk_confirm_response1;

	tk_object.send(null);
}

function tk_order_payment()
{
	w_url = "tk_pay_cond.html?x_rand="+ Math.random();

	//w2 = window.open(w_url,"Order","");

	tk_order = tk_object.open("GET", w_url, true);
	tk_object.onreadystatechange = tk_confirm_response1;
	tk_object.send(null);

}

function tk_confirm_response1()
{

	if (tk_object.readyState == 4)
	{
		if (tk_object.status == 200)
		{
			var tk_order = tk_object.responseText;
			document.getElementById('p2').innerHTML=tk_order;
		}
	}
	else
	{
		document.getElementById('p2').innerHTML="<span style=\"\">Please Wait.</span>";
	}
}

function tk_go_pay_gw()
{
	alert("Payment GW");
}


</script>

endprint;

?>

</td>
<td valign="top">
<span id="p2" style="background-color:#ffeeee;color:#000055;font-size:12px;">
	<div style="background-color : #ff7508; color : #ffffff; font-size : 12px; padding-top:2px; padding-bottom:2px;text-align : left;">&nbsp;&nbsp;Please verify your Order
	</div>
	<span style="font-size:14px;color:#000088;background-color:#B5D5BD;padding-top:5px;padding-bottom:5px;vertical-align:top;">
	<ul>
   <li>To order additional items, please [Close] this window to return to the Menu and order additional items as required.</li>
   <li>To change an order for an item, click on<br>
   	<table style="position:relative;left:+50px;font-style:italic;"><TR><td><IMG src="images/tk_inc_icon.gif" width="10" height="10" align="right" border="0"></td><TD>&nbsp;to increase</TD></TR>
   <TR><td><IMG src="images/tk_dec_icon.gif" width="10" height="10" align="right" border="0"></td><TD>&nbsp;to decrease</TD></TR>
   <TR><td><IMG src="images/tk_del_icon.gif" width="10" height="10" align="right" border="0"></td><TD>&nbsp;to delete</TD></TR>
   </table>
	</li>
   <li>When finished, click [Confirm Order] to continue.</li>
 </ul>

</div>
<div id="b1" align="right" style="background-color:#B5D5BD;"><INPUT type='button' name='confirm_order' value='Confirm Order' alt='[Confirm Order]' onclick='tk_confirm_order()'   style='background-color:#008800;color:#ffffff;height:20px;font-size:12px;'></div>

	</div>
</td>
</tr>
</table>
</div>
</body>

</html>
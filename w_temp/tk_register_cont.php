<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>TakeIn Patron Registration</title>
</head>
<html>
<div style="background-color : #d0e7bf; color : #005500; font-size : 10px; height : 15px; position : relative; text-align : center; top : -5px; vertical-align : middle; word-spacing : 15px;">
		<!--a href=info/tk_faq.html style="color:#005500;">FAQ</a-->
		<a href=info/tk_rates.html style="color:#005500;">Delivery_info_&_Rates</a>
		<a href=info/tk_delivery.html style="color:#005500;">Delivery_Area</a>
		<a href=info/tk_contact.html style="color:#005500;">Contact_TakeIn</a>
		<a href=info/tk_partner.html style="color:#005500;">Partner_Login</a>
		<a href=info/tk_faq.html style="color:#005500;">Help</a>
		</div>
 <table width="100%" cellpadding="1" cellspacing="1" border="0" style="text-align: center;">
        <tbody>
          <tr>
			<td>
			<td>
		<IMG src="images/patron_reg_15.jpg"  align="center" border="0" alt="Patron Registration"></td>
		<td style="font-size:16pt;font-weight: bold; color:#005500;">User Conditions</td>
			</span>
		<td style="vertical-align: top; text-align: right;"><img  src="images/takein_logo_01-18.png" alt="Greenwareit">
			</td>
          </tr>
        </tbody>
      </table>
<hr>
<div style="background-color : #ff7508; color : #ffffff; font-size : 14px; padding:5px; text-align:left">You need to agree to the following conditions before your registration can be accepted.
&nbsp;&nbsp;&nbsp;&nbsp;<INPUT type="button" name="agree" value="I Agree" style="background-color : #d5e6bd; color : #005500; height:20px; font-size:8px;" onclick=document.form1.submit()>&nbsp;&nbsp;
<INPUT type="button" name="agree" value="Cancel" style="background-color : #d5e6bd; color : #005500;height:20px; font-size:8px;"  onclick=history.go(-2);>
</div>
<div style="margin-left:20px; margin-right:20px; color:#005500; text-align:justify;">
   <p>In registering as a TakeIn Patron you hereby agree to the following conditions. </p>
   <p></p>
   <p>1. &nbsp;TakeIn will only act as Delivery Agent on behalf of Providers.</p>
   <p>2. &nbsp;Specifically, TakeIn will not be held liable for the quality and quantity of the products, including the container and wrapping used during delivery, ordered via its Online Ordering system and delivered to a Patron. </p>
   <p>3. &nbsp;Any complaint and dispute regarding the quality and/or quantity of a product advertised, ordered and delivered should be taken up with the respective Provider. &nbsp;TakeIn may at its discretion only act as liaison between the Patron and Provider.</p>
   <p>4. &nbsp;TakeIn will advertise and display the products from the Providers on its website in good faith. &nbsp;The information about the products are uploaded by Providers and TakeIn does not verify the content. &nbsp;TakeIn will not be held responsible for discrepancies between the product as advertised and delivered. &nbsp;Complaints in that regard should be taken up directly with the Provider.</p>
   <p>5. &nbsp;Once an order has been placed on the Online System, it cannot be changed or cancelled without the agreement of the Provider. &nbsp;It is the responsibility of the Patron to contact the Provider directly to request a change or cancellation. The Provider may at its discretion accept the change or cancellation and inform TakeIn accordingly.  In this case, a full refund will be paid to the Patron, only if the full order is cancelled before delivery.  Full delivery fee will still apply to any uncancelled part of the original order.&nbsp;</p>
   <p>6. &nbsp;If a Provider accepts to refund a Patron&nbsp;as a dispute settlement, after the product has been delivered, the full delivery fee will still apply, and will be deducted from the refund amount.</p>
   <p>7. &nbsp;Refunds will take place within 7 days of payment having been initially received and processed.</p>
   <p>8. &nbsp;TakeIn will take all reasonable measure to ensure safe delivery of the product. </p>
   <p>9. &nbsp;TakeIn will take all reasonable measure to deliver the product at the estimated time or before.   However due to circumstances beyod its control, this may not always be possible.  TakeIn will attempt to contact the Patron to inform them of any delay.
	<p>10. If as a result of an unforseen delay, a product is delivered 1 hr or later, after the estimated delivery time, the Patron will be entitled to a refund of delivery fee.</p>
   <p>11. The information stored about its Patrons on TakeIn's database will not be made available under any circumstance to any other individual or organisation, except in response to a legal order.</p>
   <p></p>
  </div>


<div align="center">
<hr>
<INPUT type="button" name="agree" value="I Agree" style="background-color : #d5e6bd; color : #005500;" onclick=document.form1.submit();>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT type="button" name="agree" value="Cancel" style="background-color : #d5e6bd; color : #005500;" onclick=history.go(-2);>
</div>

<?php

$w_ref_tag = "";
if (isset($_REQUEST["x_ref"]))
{
	$w_ref = urldecode(($_REQUEST["x_ref"]));
	$w_ref_tag = "<input type=\"hidden\" name=\"x_ref\" value=\"$w_ref\">";
}

$w_fname = urldecode($_REQUEST["x_fname"]);
$w_surname = urldecode($_REQUEST["x_surname"]);
$w_phone = urldecode($_REQUEST["x_phone"]);
$w_email_add = urldecode($_REQUEST["x_email_add"]);
$w_addr_num = urldecode($_REQUEST["x_addr_num"]);
$w_addr_street = urldecode($_REQUEST["x_addr_street"]);
$w_addr_suburb = urldecode($_REQUEST["x_addr_suburb"]);
$w_addr_pcode = urldecode($_REQUEST["x_addr_pcode"]);
$w_addr_map = urldecode($_REQUEST["x_addr_map"]);
$w_addr_mapref = urldecode($_REQUEST["x_addr_mapref"]);
$w_SD = urldecode($_REQUEST["x_SD"]);
$w_deliv_inst = urldecode($_REQUEST["x_deliv_inst"]);
$w_login_name = urldecode($_REQUEST["x_login_name"]);
$w_pword = urldecode($_REQUEST["x_pword1"]);
$w_find_us = urldecode($_REQUEST["x_find_us"]);

$w_spec_off = 0;
if (isset($_REQUEST["x_spec_off"]))
{
	$w_spec_off = urldecode($_REQUEST["x_spec_off"]);
}


print <<< endprint

	<form name="form1" action="tk_registration_agree.php" method="post" enctype="application/x-www-form-urlencoded">

	<input type="hidden" name="x_fname" value="$w_fname">
	<input type="hidden" name="x_surname" value="$w_surname">
	<input type="hidden" name="x_phone" value="$w_phone">
	<input type="hidden" name="x_email_add" value="$w_email_add">
	<input type="hidden" name="x_addr_num" value="$w_addr_num">
	<input type="hidden" name="x_addr_street" value="$w_addr_street">
	<input type="hidden" name="x_addr_suburb" value="$w_addr_suburb">
	<input type="hidden" name="x_addr_pcode" value="$w_addr_pcode">
	<input type="hidden" name="x_addr_map" value="$w_addr_map">
	<input type="hidden" name="x_addr_mapref" value="$w_addr_mapref">
	<input type="hidden" name="x_SD" value="$w_SD">
	<input type="hidden" name="x_deliv_inst" value="$w_deliv_inst">
	<input type="hidden" name="x_login_name" value="$w_login_name">
	<input type="hidden" name="x_pword" value="$w_pword">
	<input type="hidden" name="x_find_us" value="$w_find_us">
	<input type="hidden" name="x_spec_off" value="$w_spec_off">

	</form>

endprint;

?>

</html>
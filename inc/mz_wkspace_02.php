<?php
///require "./inc/mz_menu_options.php";


/*
class mz_menu_02
{
	var $mz_menu_title_array;
    var $h_username;
	var $h_home;
	var $h_return;
	var $h_close;
	var $h_reload;
	var $h_msg;
	var $h_logo;
	var $h_date_time;
	var $h_check_save;  // prompt for save?
	
	function menu_display() //alisasing display function
	{
		$this->display();
	}	
	
	function display()
	{
	
 $b1="<input class=\"mz_b_menu\" id=\"b1\" type=\"button\" value=\"Manage Membership\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(1)\"></input>";
 $b2="<input class=\"mz_b_menu\" id=\"b2\" type=\"button\" value=\"Membership Reports\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(2)\"></input>";
 $b3="<input class=\"mz_b_menu\" id=\"b3\" type=\"button\" value=\"System Admin\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(3)\"></input>";
 $b4="<input class=\"mz_b_menu\" id=\"b4\" type=\"button\" value=\"Logout\" style=\"color:#aa0000;padding:1px;\" onclick=\"w_logout()\"></input>";
 
 $mz_menu_sys = $b1.$b2.$b3.$b4;
 
 
 $b11="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Add New Member\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(11)\"></input>";
 $b12="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Edit Member\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(12)\"></input>";
 $b13="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Delete Member\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(13)\"></input>";
 //$b14="<input class=\"mz_b_s_menu\" type=\"button\" value=\"List Members\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(14)\"></input>";
 $b14="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Process Members\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(15)\"></input>";
 
 $mz_menu_sys_b1 = $b11.$b12.$b13.$b14;
 
 $b21="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Active Members\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(21)\"></input>";
 $b22="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Expired Members\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(22)\"></input>";
 $b23="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Suspended Members\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(23)\"></input>";
 $b24="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Members by Category\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(24)\"></input>";
 $b25="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Members by Age\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(25)\"></input>";
 $b26="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Members by Region\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(26)\"></input>";
 
 $mz_menu_sys_b2 = $b21.$b22.$b23.$b24.$b25.$b26;
 
 $b31="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Users\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(31)\"></input>";
 $b32="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Organisation\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(32)\"></input>";
 $b33="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Data\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(33)\"></input>";
 $b34="<input class=\"mz_b_s_menu\" type=\"button\" value=\"System Reports\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(34)\"></input>";
 //$b35="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Members by Age\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(35\"></input>";
 //$b36="<input class=\"mz_b_s_menu\" type=\"button\" value=\"Members by Region\" style=\"color:#0000aa;padding:1px;\" onclick=\"mz_do_menu(36)\"></input>";
 
 $mz_menu_sys_b3 = $b31.$b32.$b33.$b34; //.$b35.$b36;
 
 
 
 //$mz_menu_01 = $mz_menu_sys;
 
 //echo $mz_menu_01;
 
$w_ref_tag = "";
		
print <<< endprint
	
	<style>
	.mz_menu
	{
		background-color:#dddddd;
		color: #000055;
		font-size:2em;
		padding:1px;
		text-decoration:underline;		
		
	}	
	
	.mz_menu:hover, .mz_menu:active
	{
	    	background:#ffffff;
	    	text-decoration:underline;
    }	
    
    .mz_b_menu
	{
		background-color:#dddddd;
		color: #000055;
		font-size:1em;
		#text-decoration:underline;		
		width:150px;
		height:40px;
		#border-top:0px;
		#border-left:0px;
		#border-bottom:2px;
		#border-right:2px;
		
	}	
	
	.mz_b_menu_sm
	{
		background-color:#dddddd;
		color: #000055;
		font-size:1em;
		width:100px;
		height:30px;
			
	}	
	
	.mz_b_menu:hover, .mz_b_s_menu:active
	{
	    	background-color:#ffffff;
	    	text-decoration:underline;
	    		
    }
    
    .mz_b_s_menu
	{
		background-color:#dddddd;
		color: #000055;
		font-size:1em;
		#text-decoration:underline;
		width:150px;
		height:40px;
		#border-top:1px;
		#border-left:0px;
		#border-bottom:10px;
		#border-right:2px;
				
	}	
	
	.mz_b_s_menu:hover, .mz_b_s_menu:active
	{
	    	background-color:#ffffff;
	    	text-decoration:underline;
    }
	</style>
	
	<script>
	function w_logout()
	{
		var m1 = document.getElementById("mz_sys_menu_b1");
		//m1.style.zIndex=0;
		m1.style.display ="none";
		
		confirm_logout();
			
	}
	
	function member_reports()
	{
		var m1 = document.getElementById("mz_sys_menu_b2");
		//m1.style.zIndex=2;
		m1.style.display ="none";
		
		//alert("Doing Reports");
	}
	
	function mz_sys_admin()
	{
		var m3 = document.getElementById("mz_sys_menu_b3");
		
		m3.style.zIndex=2;
		m3.style.display ="inherit";
		
		//alert("Doing Sysadmin");
	}
	
	function mz_manage_member()
  	{
		var m1 = document.getElementById("mz_sys_menu_b1");

		m1.style.zIndex=2;
		m1.style.display ="inherit";
		
	}	
	
	function mz_member_report()
  	{
		var m2 = document.getElementById("mz_sys_menu_b2");

		m2.style.zIndex=2;
		m2.style.display ="inherit";
		
			
	}	
	
	function mz_add_member()
	{
		var m1 = document.getElementById("mz_sys_menu_b1");

		m1.style.zIndex=0;
		m1.style.display ="inherit";
		
		document.getElementById("b1").style.backgroundcolor="#ffffff";
		//document.getElementById("mz_sys_menu_b1").style.display ="none";
		//location.href="mz_register.php";
		document.getElementById("mz_add_pane").style.visibility="visible";
	}
	
	function mz_edit_member()
	{
		var m1 = document.getElementById("mz_sys_menu_b1");

		m1.style.zIndex=0;
		m1.style.display ="inherit";
		
		document.getElementById("b1").style.backgroundcolor="#ffffff";
		//document.getElementById("mz_sys_menu_b1").style.display ="inherit";
		
		document.getElementById("mz_edit_pane").style.visibility="visible";
		
	}
	
	function mz_find_member(f_member_search_key)
	{
		//alert(f_member_search_key);
		w_href="mz_get_member.php?x_search_key="+f_member_search_key;
		location.href=w_href;
	}
	
	function cancel_mz_edit()
	{
		l1 = document.getElementById("mz_edit_pane");
		l1.style.visibility="hidden";
	}
	
	function cancel_mz_add()
	{
		l2 = document.getElementById("mz_add_pane");
		l2.style.visibility="hidden";
	}
	
	function close_mzlist()
	{
		document.getElementById("mz_list").style.visibility="hidden";
	}	
	

	function mz_do_menu(w_menu_option)
	{
		document.getElementById("mz_sys_menu_b1").style.display ="none";
		document.getElementById("mz_sys_menu_b2").style.display ="none";
		document.getElementById("mz_sys_menu_b3").style.display ="none";
		
		switch(w_menu_option)
		{
		case 1:
			//location.href="mz_register.php";
			mz_manage_member();
			break;
		case 2:
			//alert("Doig Reports");
			mz_member_report();
			break;
		case 3:
			//alert("Doing Sys_Admin");
			mz_sys_admin();
			break;		
		case 11:
			mz_add_member();
			break;
		case 12:
			//alert("Doing Edit");
			mz_edit_member();
			break;
		case 13:
			alert("Doing Delete");
			mz_delete_member();
			break;
		case 14:
			alert("Doing List");
			break;
		case 15:
			alert("Doing Process Membership");
			break;
		case 16:
			alert("Doing Edit");
			break;
		case 17:
			alert("Doing Edit");
			break;
		case 21:
			alert("Doing 21");
			break;
		case 22:
			alert("Doing 22");
			break;
		case 23:
			alert("Doing 23");
			break;
		case 24:
			alert("Doing 24");
			break;			
		case 25:
			alert("Doing 25");
			break;	
		case 26:
			alert("Doing 26");
			break;	
		case 31:
			alert("Doing 31");
			break;	
		case 32:
			alert("Doing 32");
			break;			
		case 33:
			alert("Doing 33");
			break;	
		case 34:
			alert("Doing 34");
			break;	
		case 35:
			alert("Doing 35");
			break;	
		default:
			alert("No Option");
		}
			
	}	
	
	</script>
	
		<!--table>
		<tr>
		<td-->
		
		<div style="position:relative;top:-10px;">$mz_menu_sys</div>
		
			<div id="mz_sys_menu_b1" 
		    	style="position:relative;top:-20px;left:10px;width:90%;
				z-index:0;display:none;">
			$mz_menu_sys_b1
			</div>
			
			<div id="mz_sys_menu_b2" 
		    	style="position:relative;top:-20px;left:10px;width:90%;
				z-index:0;display:none;">
			$mz_menu_sys_b2
			</div>
			
			<div id="mz_sys_menu_b3" 
		    	style="position:relative;top:-20px;left:10px;width:90%;
				z-index:0;display:none;">
			$mz_menu_sys_b3
			</div>
		
		
		
		<!--/td>
		</tr-->
		
		<div id="mz_edit_pane"
							
			style="margin-left:10px;
			margin-right:10px;
			margin-top:10px;
			margin-bottom:10px;
			padding-right:20px;
			padding-left:20px;
			padding-top: 10px;
			padding-bottom:20px;
			background-color:#D7E3F4;opacity:0.90;
			position:absolute;
			bottom:5px;right:5px;left:5px;
			border:solid;
			visibility:hidden;z-index:inherit;">
			
			<div style="text-align:right;position:relative;top:-9px;right:-18px;">
<input type="button" style="height:30px; width:30px;background-color:#ffffff;font-size:16px;text-align:center; solid;font-weight:bold;color:#880000;" name="Cancel" value="X" onclick="cancel_mz_edit()">
</div>
endprint;

include "./inc/mz_show_edit_pane_inc.php";

print <<< endprint

			
</div>

<div id="mz_add_pane"
							
			style="margin-left:10px;
			margin-right:10px;
			margin-top:10px;
			margin-bottom:10px;
			padding-right:20px;
			padding-left:20px;
			padding-top: 10px;
			padding-bottom:20px;
			background-color:#D7E3F4;opacity:0.90;
			position:absolute;
			bottom:5px;right:5px;left:5px;
			border:solid;
			visibility:hidden;z-index:inherit;">
			
			<div style="text-align:right;position:relative;top:-9px;right:-18px;">
<input type="button" style="height:30px; width:30px;background-color:#ffffff;font-size:16px;text-align:center; solid;font-weight:bold;color:#880000;" name="Cancel" value="X" onclick="cancel_mz_add()">
</div>
endprint;

include "./inc/mz_show_add_pane_inc.php";

print <<< endprint
			
</div>
		
<div id="mz_list" 
style="margin-left:10px;position:relative;top:-20px;left:60%;height:80%;width:35%;
z-index:inherit;border:solid;border-width:1px;
background-color:#fafafa;opacity:0.95;visibility:hidden;">
<div style="margin-left:10px;>
Dadad<br>
dada
</div>

</div>		
		
endprint;

	}
}
*/
?>

<?php


class mz_header
{
	var $h_title;
    var $h_username;
	var $h_home;
	var $h_return;
	var $h_close;
	var $h_reload;
	var $h_msg;
	var $h_logo;
	var $h_date_time;
	var $h_check_save;  // prompt for save?
	
	function h_display() //alisasing display function
	{
		$this->display();
	}	
	
	function display()
	{
	
	$f_logo = "<td align=\"center\"><img src=\"./elt_img/mzone_01_12.png\" alt=\"MZone: Membership Management\" width=180 align=\"right\"></td>
		</tr>";
	$f_home ="<a href=\"/mzone/mz_00.php\"><font size=\"-1\"><img src=\"./elt_img/elt_home_1.png\" alt=\":: Home ::\" border=\"0\"></font></a>";
	//$f_home="<a href=\"/elt01/mz_00.php\"><font size=\"-1\"><button style=\"background-color:#97cf3b;font-size:8pt;\">:: Home ::</button></a>";
	$f_return = "";
	$f_close = "";
	$f_reload = "";
	$f_date_time = "";
	$f_check_save = "0";  // prompt for save?
	
	if ($this->h_check_save == "t")
	{
		$f_check_save = "1";
	}
		
	if (($this->h_return == "t")||($this->h_return == ""))
	{
		$f_return = "<a href=\"javascript:return01($f_check_save)\"><img src=\"/mzone/elt_img/return-bs.jpg\" size=\"10\" alt=\":: Return ::\" border=\"0\"></a>";
	}
		
	if ($this->h_close == "t")
	{
		$f_close = "<a href=\"javascript:close01($f_check_save);\"><img src=\"/mzone/elt_img/close-rs.jpg\" size=\"10\" alt=\":: Close ::\" border=\"0\"></a>";
		$f_return = "";
	}
	
	if ($this->h_reload == "t")
	{
		$f_reload = "<span style=\"color:#880000;\">Click to view latest update --&gt;</span><a href=\"javascript:document.location.reload()\"><img src=\"/mzone/elt_img/reload-brs.jpg\" size=\"10\" alt=\"[Reload]\" border=\"0\"></a>";	}	
	
	if ($this->h_home == "f")
	{
		$f_home = "&nbsp ";
	}	
	
	if ($this->h_logo == "f")
	{
		$f_logo = "";
	}	

	if ($this->h_date_time == "t")
	{
		$f_date_time = date("Y-m-d @  H:i:s");
			
	}

		
	print <<< endprint
	<style>
	.mz_menu
	{
		background-color:#ededed;
		color: #000055;
		font-sze:14px;
		padding:3px;
		border-style: solid;
		border-right:solid;border-right-width:2px;
		border-left:solid;border-left-width:2px;
		border-color:#000000;
	}	
	</style>
	
	<script language="javascript">
	function check_save()
	{
		if (confirm("Have you saved the information before exiting?\\n OK to continue or Cancel and Save Data."))
		{
			this.close();
		}
	}
	
	function close01(chksave)
	{	
		if (chksave == 1)
		{
	     if (confirm("Have you saved the information before exiting?\\n OK to continue or Cancel and Save Data."))
		   {
			   this.close();
		   }
		}
		else
		{
			this.close();
		}	
	} 
	
	function return01(chksave)
	{	
		if (chksave == 1)
		{
	     if (confirm("Have you saved the information before exiting?\\n OK to continue or Cancel and Save Data."))
		   {
			   history.back();
		   }
		}
		else
		{
			history.back();
		}	
	} 
	
	function logout()
	{
		if (confirm("Please click [OK] to confirm logout from MZone, or [Cancel] to continue working."))
     {
        location.href = "/mzone/mz_logout.php";
     }
  	}	
		
</script>
		
		<table width="100%">
		<tr>
		<td width=33%>$f_home</font></a></td>
		<td width=33% align="center"><span style="color: #000080; font-weight: bold;">$this->h_title</span></td>
		<td width=33%>$f_logo</td>
		</tr>
		<tr>
		<!--td><span style="color: #000080; font-size:10pt;">$this->h_username : $f_date_time</span></td-->
		<td colspan=2 align=right>
		<div align="right">
    		$f_reload &nbsp;&nbsp;$f_return $f_close
  		</div>
		</td>
		</table>
		<span style=font-size:12pt;>
		$this->h_msg
		</span>
		<hr>

		
endprint;

	}
}

class mz_header_2
{
	var $h_title;
    var $h_username;
	var $h_home;
	var $h_return;
	var $h_close;
	var $h_reload;
	var $h_msg;
	var $h_logo;
	var $h_date_time;
	var $h_check_save;  // prompt for save?
	
	function h_display() //alisasing display function
	{
		$this->display();
	}	
	
	function display()
	{
	
	$f_logo = "<td align=\"center\"><img src=\"./elt_img/mzone_01_12.png\" alt=\"MZone : Membership Management\" width=120 border=0 align=\"right\"></td>
		</tr>";
	$f_home ="<a href=\"/mzone/mz_00.php\"><font size=\"-1\"><img src=\"./elt_img/elt_home_1.png\" alt=\":: Home ::\" border=\"0\"></font></a>";
	//$f_home="<a href=\"/elt01/mz_00.php\"><font size=\"-1\"><button style=\"background-color:#97cf3b;font-size:8pt;\">:: Home ::</button></a>";
	$f_return = "";
	$f_close = "";
	$f_reload = "";
	$f_date_time = "";
	$f_check_save = "0";  // prompt for save?
	
	if ($this->h_check_save == "t")
	{
		$f_check_save = "1";
	}
		
	if (($this->h_return == "t")||($this->h_return == ""))
	{
		$f_return = "<a href=\"javascript:return01($f_check_save)\"><img src=\"/mzone/elt_img/return-bs.jpg\" size=\"10\" alt=\":: Return ::\" border=\"0\"></a>";
	}
		
	if ($this->h_close == "t")
	{
		$f_close = "<a href=\"javascript:close01($f_check_save);\"><img src=\"/mzone/elt_img/close-rs.jpg\" size=\"10\" alt=\":: Close ::\" border=\"0\"></a>";
		$f_return = "";
	}
	
	if ($this->h_reload == "t")
	{
		$f_reload = "<span style=\"color:#880000;\">Click to view latest update --&gt;</span><a href=\"javascript:document.location.reload()\"><img src=\"/mzone/elt_img/reload-brs.jpg\" size=\"10\" alt=\"[Reload]\" border=\"0\"></a>";	}	
	
	if ($this->h_home == "f")
	{
		$f_home = "";
	}	
	
	if ($this->h_logo == "f")
	{
		$f_logo = "";
	}	

	if ($this->h_date_time == "t")
	{
		$f_date_time = date("Y-m-d @  H:i:s");
	}

   
print <<< endprint

<script language="javascript">
	function check_save()
	{
		if (confirm("Have you saved the information before exiting?\\n OK to continue or Cancel and Save Data."))
		{
			this.close();
		}
	}
	
	function close01(chksave)
	{	
		if (chksave == 1)
		{
	     if (confirm("Have you saved the information before exiting?\\n OK to continue or Cancel and Save Data."))
		   {
			   this.close();
		   }
		}
		else
		{
			this.close();
		}	
	} 
	
	function return01(chksave)
	{	
		if (chksave == 1)
		{
	     if (confirm("Have you saved the information before exiting?\\n OK to continue or Cancel and Save Data."))
		   {
			   history.back();
		   }
		}
		else
		{
			history.back();
		}	
	} 
	
	function logout()
	{
		if (confirm("Please click [OK] to confirm logout from MZone, or [Cancel] to continue working."))
     {
        location.href = "/mzone/mz_logout.php";
     }
  	}	
  	
  			
	</script>
		
	<table width="100%">
	<tr>
	<td colspan="2" align="left" style="background: #D7E3F4;padding-left:10px;"><span style="color: #000080; font-weight: bold;">$this->h_title</span></td>
	<td>$f_logo</td>
	</tr>
   	</table>
   	<hr style="position:relative;top:-5px;background-color:#000000;height:3px;">	
   		
endprint;

	} 


}	

?>

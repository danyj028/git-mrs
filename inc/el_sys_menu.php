<?php
// System Menu Classes

class el_sys_menu
{
	var $sm_code;
	var $sm_title;
	var $sm_target;
	var $sm_auth_level;
	var $sm_style;
	var $sm_order;
	var $sm_menu;
	var $sm_scale;
	
	function sm_get_menu($w_db)
	{
		$w_query = "select * from el_sys_menu where el_menu_id = '$this->sm_code' order by el_menu_item_order";
		
		$w_db->query($w_query);
	
	/*	$this->sm_title = $w_db->f("el_menu_title");
		$this->su_level = $w_db->f("el_menu_target");
		$this->su_sub_level = $w_db->f("el_menu_auth_level");
		$this->su_value = $w_db->f("el_menu_style");  */
		
		while ($w_db->next_record())
		{
			$this->sm_menu[] = array (
	 			'm_title'=>$w_db->f("el_menu_title"),
				'm_target'=>$w_db->f("el_menu_target"),
				'm_auth_lelvel'=>$w_db->f("el_menu_auth_level"),
				'm_style'=>$w_db->f("el_menu_style"),
			 );
		}
		
	}
	
	function sm_show_menu($w_code, &$w_db, $w_scale)
	{

		$this->sm_code = $w_code;
		$this->sm_scale = $w_scale;
;
		$this->sm_get_menu($w_db);

		$k = 1;

		//echo "<br>";

		foreach ($this->sm_menu as $w_menu_line)
		{
			if (substr($w_menu_line["m_title"],0,1) == '-')
			{
				print <<< endprint
				
				<div align="center" width="200px" style="height:5px;">
				<hr style="width:400px;text-align:center;color:#000099;height:3px;position:relative;top:-5px;">
				</div>
endprint;
		
			}
			else
			{
			$w_title = $w_title_ori= trim($w_menu_line["m_title"]);
			$w_img_width=365;

			$w_img_height= $this->sm_scale*40;  //scale menu-height

			if (strlen($w_title_ori)>36)
			{
				$w_title = "<span style=\"font-size:14px;\">".$w_title."</span>";
				$w_img_width=400;
			}

			if (strlen($w_title_ori)>45)
			{
				$w_title = "<span style=\"font-size:12px;\">".$w_title."</span>";
				$w_img_width=420;
			}

			$w_target = $w_menu_line["m_target"];

			$w_img = "../el01img/ell_btn_1.png";

			switch ($w_menu_line["m_style"]) {
				case "1":
    			$w_img = "../el01img/ell_btn_1.png";
			break;
				case "2":
    			$w_img = "../el01img/ell_btn_2.png";
    		break;
				case "3":
    			$w_img = "../el01img/ell_btn_3.png";
    		break;
				case "4":
    			$w_img = "../el01img/ell_btn_4.png";
    		break;
				case "5":
    			$w_img = "../el01img/ell_btn_5.png";
    		break;
				case "6":
    			$w_img = "../el01img/ell_btn_6.png";
    		break;
			}

			$w_menuk = "menu_".$k;

			print <<< endprint
				<div align="center" width="200px">
				<IMG src="$w_img" width="$w_img_width" height="$w_img_height" border="0">
				<div style="height:5px;position:relative;top:-30px;text-align:center;font-size:16px;">
				<a href=$w_target name="$w_menuk">
				$w_title</a>
			</div>	
	</div>
endprint;
			$k++;
			}
		}
	}
	
	function sm_add_item()
	{
	}

	function sm_del_item()
	{
	}

	function sm_set_auth_level()
	{
	}

}	

?>


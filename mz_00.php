<?php

function happy_bday($w_fname, $w_dob)
{
	print <<< endprint
	<script language="javascript">
	window.open("/mrs/inc/mz_hb.php?x_fname=$w_fname&x_dob_str=$w_dob","Happy_Birthday","width=480, height=480")
	</script>

endprint;
}

function check_anouncement($w_userid, $w_uname, &$do_me, &$w_db, &$w_an_tag)
{
/*

	if ($do_me)
	{

		$w_query = "select el_an_start as c from el_announcement where
						(el_an_start <= current_date) and
						((el_an_start + el_an_days) >= current_date) and
						(el_an_audience = '_all')";
						
		$w_stm = $mz_db->prepare($w_query);
		$w_stm->execute();

		$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);		

		$w_rec_no = $w_stm->rowCount();

		//$w_db->query($w_query);

		if ($w_rec_no > 0)
		{

			//$w_an_tag = true;

			print <<< endprint
			<script language="javascript">
				window.open("/mrs/el_tools/el_s_an_display.php?x_userid=$w_userid","Announcement","width=640, height=440")
			</script>

endprint;
		}

		$w_query2 = "select el_an_start from el_announcement where
									(el_an_start <= current_date) and
									((el_an_start + el_an_days) >= current_date) and
									(el_an_audience = '$w_userid')";
									
		$w_stm = $mz_db->prepare($w_query2);
		$w_stm->execute();

		$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);

		$w_rec_no = $w_stm->rowCount();

		//$w_db->query($w_query2);

		if ($w_rec_no > 0)
		{

			//$w_an_tag = true;

		print <<< endprint
			<script language="javascript">
				window.open("/mrs/mz_tools/mz_p_an_display.php?x_userid=$w_userid&x_username=$w_uname","Personal_Announcement","width=640, height=440")
			</script>

endprint;
		}

		$do_me = false;
		}
*/
}



/********************************************/
session_start();

/* if (isset($_COOKIE["MZ_dbxxx"])&&isset($_COOKIE["MZauth"]))
{
	$w_dbxxx = $_SESSION['MZ_dbxxx'];
}
else
{
	die("Error using MZone.<br>Probable cause: User is not logged in or your login session has been invalidated.<br>Solution: Close the browser and start again [err:l01].");
}
*/

//echo session_name("PHPSESSID");

//$short_session_id = substr($_SESSION["PHPSESSID"],0,15);

require "./inc/connect_to_db1.php";

$short_session_id = substr(session_id(), 0, 15);
$w_timestamp = date( "Y-m-d, h:i:s", time() );
$w_time_string = trim(date( "H:i \o\\n D d-M-Y", time() ));

/*if (isset($_SESSION["MZuserid"]))
{
	
}
else
{
	echo ("User session has been closed or has expired.  Please <a href=\"/mrs/login.php\">login</a> again<br>");
	die();
}	
*/

//echo $short_session_id;die();


include_once "./inc/mz_header.php";

//include "./inc/mz_menu_01.php";

//Log user in log file.


//$w_query = "insert into mz_log01 values ('$w_userID',  default, '$short_session_id')";

//$w_stm = $mz_db->prepare($w_query);
//$w_stm->execute();


//$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);

//$w_rec_no = $w_stm->rowCount();


$auth_level = $_SESSION["MZauth"];

//$auth_level = 2;
	
$w_username = $_SESSION["MZ_loginname"];
$w_dbxxx = $_SESSION["MZ_dbxxx"];

print <<< endprint

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>


<head>
	<META HTTP-EQUIV="Pragma" CONTENT="No-cache">
	<neta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
    <link rel=stylesheet href="mz_css/mz_01.css" type="text/css">
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

    <title>MZone</title>
</head>
<script src="./jscript/mz_ajax_f_01.js" type="text/javascript"></script>
<script src="./jscript/mz_member_reports_functions.js" type="text/javascript"></script>
<!--script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script-->

<style>
body {font-size: 80%;}
</style>

<html>
<body>

endprint;

$auth_level = 1;

//echo $auth_level;


if ($auth_level > 1)
{
	include "./mz_01.php";
}
elseif ($auth_level > 3) 
#level 3 access  -- not used here
{
  include "./mz_02_admin.php";
}
elseif ($auth_level > 0)
{
  include "./mz_01s.php";

}

?>

</body>
</html>




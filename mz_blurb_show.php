<html>
	<head>
		<title>AOSD Search</title>
		<meta name="author" content="root" >
		<meta name="generator" content="Bluefish 2.2.3" >
		<meta name="description" content="" >
		<meta name="keywords" content="AOSD Management" >
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
		<meta http-equiv="Content-Script-Type" content="text/javascript" >
		<meta http-equiv="Content-Style-Type" content="text/css" >
		<link rel="stylesheet" href="elt_css/elt_01.css" type="text/css">
	</head>
	
<style>
.cl_1
	{
		background-color:#fefefe;
		color: #000055;
		font-size:0.8em;
		padding:5px;
		border-radius:3px;	
	}	
	
.cl_2
	{
		background-color:#e2edfc;
		color: #0000aa;
		font-size:1em;
		line-height:1.2;
		padding:10px;
		border-radius:8px;
		margin-left:10px;
		margin-right:25%;
		border-right-style:solid;
		border-bottom-style:solid;
		
	}	
	
	.cl_2n
	{
		background-color:#fafafa;
		color: #0000aa;
		font-size:0.8em;
		line-height:1.2;
		padding:10px;
		border-radius:5px;
		margin-left:20px;
		margin-right:25%;
		border-right-style:solid;
		border-bottom-style:solid;
	}
	
	.stcl
	{
		font-style:italic;
		font-weight:bold;
	}
	
	.tb1
	{
		font-weight:bold;
		font-size:1.2em;
	}
	
	.tl1
        {
                font-weight:bold;
                font-size:1.0em;
        }
 
        

</style>

<?php

// We use PostgreSQL text search features to retrieve matching record

include "./inc/connect_to_db.php"; //connect to mrsdb

print <<< endprint

<div style="margin-right:20px;margin-left:20px;">

endprint;

$title_string = "Australian Open Source Directory";
include "./inc/mz_header.php";

$h = new mz_header;

$h->h_logo = "t";
$h->h_return="f";
$h->h_home="f";
$h->h_username="Unknown Guest";
$h->h_title = "<div style=\"font-size:1.3em;color:#79A0F5;background:#ffffff;padding:8px;border-radius:15px 15px;border:2px solid;\">$title_string</div>";
$h->h_date_time = "t";
$h->h_display();

print <<< endprint

<span class="cl_1">
Information shown in the profile below was provided by the business or individual mentionned.
</span>
<hr>

endprint;

//$w_keyword = urldecode($_REQUEST["x_keyword"]);
//$w_kw_array = explode(" ",$w_keyword);
$w_user_id = urldecode($_REQUEST["x_user_id"]);

/*
$w_search_term = "";
$k = 0;
if (count($w_kw_array) > 1)
{
	$c = count($w_kw_array);
	
	for ($k==0;$k<$c;$k++)
	{
		
	   $w_search_term .= $w_kw_array[$k]." | ";
	}
	
	$w_search_term .= "_";
}
elseif (count($w_kw_array) == 1)
{
	$w_search_term = $w_keyword;
}	
*/


$w_query = "select u.id, u.fname, u.surname, u.orgname, u.rec_status, u.member_status, p.user_tag_line, p.profile, p.user_url from mz_user_profile p
	join mzuser u on u.id = p.user_id
	where user_id = '$w_user_id'";


//	where (profile_vector@@to_tsquery('$w_search_term')) and rec_status ='1'
//	order by member_status desc, random()";
	
//	echo $w_query;//die();
	
	$w_stm = $mz_db->prepare($w_query);
	$w_stm->execute();
		
	$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);
				
	if  (isset($w_rec) && $w_rec > 0)
	{
		$w_rec_no = $w_stm->rowCount();
		
		$k = 1;
		
		for ($k==1;$k<=$w_rec_no;$k++)
		{
			$w_userid = $w_rec["id"];
			$w_tag_line = $w_rec["user_tag_line"];
			$w_org = $w_rec["orgname"];
			$w_surname = $w_rec["surname"];
			$w_fname= $w_rec["fname"];
			$w_url = $w_rec["user_url"];
			$w_m_status = $w_rec["member_status"];
			$w_m_blurb = $w_rec["profile"];
			
			if ($w_m_status==1)  //set css display format class 
			{
				$w_cl = "cl_2";
			}	
			else
			{
				$w_cl = "cl_2n";
			}	
			
			$w_title = $w_org;
			if ($w_org == "")
			{
				$w_title = toupper($wfname)." ".toupper($w_surname);
			}
			
			echo "<div class=\"".$w_cl."\"><br><span class=\"tb1\">".$w_title."</span><br><br><span class=\"tl1\">".$w_tag_line."</span><br><span style=\"font-size:0.8em\">".$w_m_blurb."</span><br><br><a href=\"http://".$w_url."\"> Website</a></div><br>";		
			
		}
	}
	else
	{
		echo "No record found matching keyword. Please try a different search.";
	}


?>

</div>

</html>

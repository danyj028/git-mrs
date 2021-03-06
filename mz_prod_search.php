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
	}	
	
.cl_2
	{
		background-color:#e2edfc;
		color: #0000aa;
		font-size:1em;
		line-height:1.2;
		padding:10px;
		border-radius:5px;
		margin-left:10px;
		margin-right:25%;
		
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
	}
	
	.stcl
	{
		font-style:italic;
		font-weight:bold;
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
Search result shows matching records with OSIA Members appearing first. Records are sorted in random order.
</span>
<hr>

endprint;

$w_keyword = urldecode($_REQUEST["x_keyword"]);
$w_kw_array = explode(" ",$w_keyword);

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

$w_search_term = strtolower($w_search_term);

//build query on product term

$w_query="select u.id, u.orgname, u.fname, u.surname, u.rec_status, u.member_status, sk.service_title, p.user_tag_line,p.user_url from mz_user_service_2 us 
join mzuser as u on u.id = us.user_id
join mz_service_key sk on us.service_key_id = sk.service_id 
join mz_user_profile p on p.user_id = u.id
where service_title='$w_search_term' and u.rec_status = '1'
order by member_status desc, random()";	
	
	//echo $w_query;//die();
	
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
			
			if ($w_m_status==1)
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
			$w_st_u = ucfirst($w_search_term);
			echo "<div class=\"".$w_cl."\"><span class=\"stcl\">$w_st_u</span><br><a href=\"mz_blurb_show.php?x_user_id=".$w_userid."\">".$w_title."</a><br> ".$w_tag_line."</div><br>";
			
			$w_rec  = $w_stm->fetch(PDO::FETCH_ASSOC);
		}
	}
	else
	{
		echo "No record found matching search term. Please try a different search.";
	}


?>

</div>

</html>
